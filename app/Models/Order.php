<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'invoice_code',
        'order_date',
        'completion_date',
        'status',
        'total_price'
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'completion_date' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);

    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_details')
            ->withPivot('qty', 'subtotal')
            ->withTimestamps();
    }

    public function orderDetails()
    {
        // Tambahkan 'order_id' secara eksplisit
        return $this->hasMany(order_details::class, 'order_id');
    }
}

