<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inbound extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'link',
        'description',
        'port',
        'ip',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'inbound_user')->using(InboundUser::class);
    }
}
