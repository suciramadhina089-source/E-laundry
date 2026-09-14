<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class services extends Model
{
    protected $fillable = ['name', 'price_per_kg', 'unit'];
    public function orderDetails(): HasMany
    {
        return $this->hasMany(Orderdetail::class);

    }
}
