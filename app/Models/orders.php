<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class orders extends Model
{
    protected $fillable = [
        'customer_id',
        'invoice_code',
        'order_date',
        'completion_date',
        'status',
        'total_price'
    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class);

    }
    public function orderdetails(): HasMany
    {
        return $this->hasMany(orderdetail::class);

    }
}

