<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relasi: 1 kategori punya banyak item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
