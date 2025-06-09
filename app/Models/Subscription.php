<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    protected $primaryKey = 'subscription_id';

    protected $fillable = [
        'user_id',
        'package_id',
        'total_price',
        'status',
        'start_date',
        'end_date',
        'pause_start',
        'pause_end',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'pause_start',
        'pause_end',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }

    public function subscriptionMeals(): HasMany
    {
        return $this->hasMany(SubscriptionMeal::class, 'subscription_id', 'subscription_id');
    }

    public function deliveryDays(): HasMany
    {
        return $this->hasMany(DeliveryDay::class, 'subscription_id', 'subscription_id');
    }

    public function allergyNotes(): HasMany
    {
        return $this->hasMany(AllergyNote::class, 'subscription_id', 'subscription_id');
    }
}
