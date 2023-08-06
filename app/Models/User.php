<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Roles;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Shetabit\Visitor\Traits\Visitor;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Visitor;

    const ADMIN = 'admin';

    const CUSTOMER = 'customer';

    const SUPPORTED_LANGUAGES = [
        'en' => [
            'dir' => 'ltr',
            'key' => 'en',
        ],
        'fa' => [
            'dir' => 'rtl',
            'key' => 'fa',
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'locale',
        'last_visit',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inbounds(): BelongsToMany
    {
        return $this->belongsToMany(Inbound::class, 'subscriptions')
            ->using(Subscription::class)
            ->withPivot('id', 'subscription_price', 'start_date', 'end_date', 'description');

    }

    public function activeSubscriptions(): BelongsToMany
    {
        return $this->inbounds()
            ->wherePivot('end_date', '>', now());
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

    protected function last_visit(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => Carbon::parse($value)->format('Y-m-d H:i:s')
        );
    }
}
