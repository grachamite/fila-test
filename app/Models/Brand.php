<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Brand extends Model
{
    use HasFactory;

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'brand_shop');
    }

}
