<?php

namespace App\Models;

use App\DTOs\InboundDTO;
use App\DTOs\RenewSubscriptionDTO;
use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Exceptions\NotInSupportedLanguagesListException;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Shetabit\Visitor\Traits\Visitor;
use Throwable;
use Illuminate\Database\Eloquent\Collection;

/**
 * @author Davood Ghanbarpour <ghanbarpour.davood@gmail.com>
 * @method static User find($id)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Visitor;

    const ADMIN = 'admin';

    const CUSTOMER = 'customer';

    const SUPPORTED_LANGUAGES = ['en' => ['dir' => 'ltr', 'key' => 'en',], 'fa' => ['dir' => 'rtl', 'key' => 'fa',],];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'locale', 'last_visit', 'status',];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    public function inbounds(): BelongsToMany
    {
        return $this->belongsToMany(Inbound::class, 'subscriptions')->using(Subscription::class)->withPivot('id', 'subscription_price', 'start_date', 'end_date', 'description');

    }

    public function activeSubscriptions(): BelongsToMany
    {
        return $this->inbounds()->wherePivot('end_date', '>', now());
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function hasRole(string $role): bool
    {
        return isset($this->role) && $this->role == $role;
    }

    public function isAdmin(): bool
    {
        return isset($this->role) && $this->role == Roles::ADMIN->value;
    }

    public function isCustomer(): bool
    {
        return isset($this->role) && $this->role == Roles::CUSTOMER->value;
    }

    public function isDisabled(): bool
    {
        return isset($this->status) && $this->status == UserStatus::DISABLED->value;
    }

    public function createSubscription(InboundDTO $inbound): void
    {
        if (!$this->hasSubscription($inbound)) {
            $this->inbounds()->attach($inbound->inbound_id, $inbound->toArray() + ['created_at' => now()->format('Y-m-d'), 'updated_at' => now()->format('Y-m-d')]);
        }
    }

    public function debits(): Collection
    {
        return $this->inbounds()
            ->selectRaw('ROUND( `subscriptions`.`subscription_price` * DATEDIFF(end_date, start_date) ) as debit')
            ->withPivot([
                'end_date',
                'start_date',
                'created_at',
            ])
            ->get();
    }

    public function credits()
    {
        return $this->invoices()->get();
    }

    /**
     * @throws Throwable
     */
    public function deleteSubscription($subscriptionId): void
    {
        $this->activeSubscriptions()->detach($subscriptionId);
    }

    public function renewSubscriptionById(Inbound $inboundModel, RenewSubscriptionDTO $renewSubscriptionDTO): void
    {
        $subscriptionRenewMaker = function ($inbound) use ($renewSubscriptionDTO) {
            $lastInbound = $inbound->last();
            if (is_null($lastInbound)) {
                return;
            }

            $startDate = Carbon::parse($lastInbound->pivot->end_date)->addDay();
            if (isset($renewSubscriptionDTO->end_date)) $endDate = Carbon::parse($renewSubscriptionDTO->end_date); else
                $endDate = $startDate->clone()->addDays($renewSubscriptionDTO->day_count);

            if ($startDate->gte($endDate)) {
                return;
            }

            $this->createSubscription(new InboundDTO(['inbound_id' => $lastInbound->id, 'start_date' => $startDate->format('Y-m-d H:i:s'), 'end_date' => $endDate->format('Y-m-d H:i:s'), 'subscription_price' => removeSeparator($renewSubscriptionDTO->price ?? $lastInbound->pivot->subscription_price),]));
        };

        $this->inbounds()->find($inboundModel->id)->map($subscriptionRenewMaker);
    }

    public function renewSubscription(array $renewSubscriptionArray): void
    {
        $subscriptionRenewMaker = function ($inbound) use ($renewSubscriptionArray) {
            $lastInbound = $inbound->last();
            if (is_null($lastInbound)) {
                return;
            }

            $startDate = Carbon::parse($renewSubscriptionArray['start_date'] ?? $lastInbound->pivot->end_date)->addDay();
            if (isset($renewSubscriptionArray['end_date'])) 
                $endDate = Carbon::parse($renewSubscriptionArray['end_date']); 
            else
                $endDate = $startDate->clone()->addDays($renewSubscriptionArray['day_count']);

            if ($startDate->gte($endDate)) {
                return;
            }

            $this->createSubscription(new InboundDTO(['inbound_id' => $lastInbound->id, 'start_date' => $startDate->format('Y-m-d'), 'end_date' => $endDate->format('Y-m-d'), 'subscription_price' => removeSeparator($renewSubscriptionArray['price'] ?? $lastInbound->pivot->subscription_price),]));
        };

        $this->inbounds()->orderBy('end_date')->get()->groupBy('id')->map($subscriptionRenewMaker);
    }

    public function hasSubscription(InboundDTO $inboundDTO): bool
    {
        return $this->inbounds()
            ->where('inbounds.id', $inboundDTO->inbound_id)
            ->wherePivot('start_date', '>=', $inboundDTO->start_date)
            ->wherePivot('end_date', '<=', $inboundDTO->end_date)
            ->exists();
    }

    /**
     * @throws Throwable
     */
    public function setLocale(string $locale): bool
    {
        throw_if(!in_array($locale, array_column(User::SUPPORTED_LANGUAGES, 'key')), new NotInSupportedLanguagesListException("Provided language {$locale} is not supported"));

        return $this->update(['locale' => $locale]);
    }

    public function updateVisitTime(): bool
    {
        return $this->update(['last_visit' => now(),]);
    }

    protected function last_visit(): Attribute
    {
        return Attribute::make(set: fn(string $value) => Carbon::parse($value)->format('Y-m-d H:i:s'));
    }

    protected function password(): Attribute
    {
        return Attribute::make(set: fn(string $value) => Hash::make($value));
    }
}
