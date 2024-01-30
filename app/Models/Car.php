<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $keyType = 'string';

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'color',
        'year',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->whereNull('car_user.deleted_at')
            ->withTimestamps();
    }
}
