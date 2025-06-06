<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_shop');
    }
}
