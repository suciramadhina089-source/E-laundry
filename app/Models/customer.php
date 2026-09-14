<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class customer extends Model
{
    protected $fillable = ['name', 'phone', 'address'];
    public function orders(): HasMany
    {
        return $this->hasMany(orders::class);

    }
}
