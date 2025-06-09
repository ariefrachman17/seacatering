<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AllergyNote extends Model
{
    protected $table = 'allergy_notes';

    protected $fillable = [
        'subscription_id',
        'note',
    ];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'subscription_id');
    }
}
