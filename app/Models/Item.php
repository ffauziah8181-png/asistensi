<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'name', 'price', 'stock'];

    // Relasi: 1 item dimiliki oleh 1 kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}