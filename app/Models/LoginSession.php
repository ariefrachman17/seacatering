<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginSession extends Model
{
    protected $table = 'login_sessions';

    protected $primaryKey = 'session_id';

    protected $fillable = [
        'user_id',
        'login_time',
        'logout_time',
        'ip_address',
    ];

    protected $dates = [
        'login_time',
        'logout_time',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
