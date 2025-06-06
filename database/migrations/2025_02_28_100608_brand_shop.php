<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\Shop;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brand_shop', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)->constrained()->comment('Идентификатор производителя');
            $table->foreignIdFor(Shop::class)->constrained()->comment('Идентификатор магазина');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_shop');
    }
};
