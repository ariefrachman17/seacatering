<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;

    protected $primaryKey = 'subscription_id';
    
    protected $fillable = [
        'user_id',
        'package_id', 
        'start_date',
        'end_date',
        'total_price',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}