<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $primaryKey = 'package_id';

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'package_id', 'package_id');
    }
}
