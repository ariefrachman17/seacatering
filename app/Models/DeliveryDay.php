<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryDay extends Model
{
    protected $table = 'delivery_days';

    protected $fillable = [
        'subscription_id',
        'day',
    ];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'subscription_id');
    }
}
