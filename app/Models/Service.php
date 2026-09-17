<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price_per_kg', 'unit'];
    public function orders()
    {
        return $this->belongsToMany(Order_details::class, 'order_details')
            ->withPivot('qty', 'subtotal')
            ->withTimestamps();
    }
}
