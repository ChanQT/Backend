<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentHistory extends Model
{
    protected $fillable = [
        'tenant_name',
        'room',
        'payment_amount',
        'payment_date',
        'status',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];
}
