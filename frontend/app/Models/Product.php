<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'category', 'price', 'customer_id'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
