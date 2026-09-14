<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order_details extends Model
{
    protected $fillable = [
        'order_id',
        'service_id',
        'qty',
        'subtotal'
    ];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}

