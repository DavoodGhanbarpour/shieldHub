<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 'admin';

    const CUSTOMER = 'customer';

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
        return $this->belongsToMany(Inbound::class, 'inbound_user');
    }

    public function hasRole(string $role): bool
    {
        return isset($this->role) && $this->role == $role;
    }

    public function isAdmin(): bool
    {
        return isset($this->role) && $this->role == self::ADMIN;
    }

    public function isCustomer(): bool
    {
        return isset($this->role) && $this->role == self::CUSTOMER;
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => Hash::make($value),
        );
    }
}
