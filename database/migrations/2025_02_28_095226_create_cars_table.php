<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\Body;
use App\Models\Color;
use App\Models\Shop;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('model', 32)->comment('Модель');
            $table->foreignIdFor(Brand::class)->constrained()->comment('Идентификатор производителя');
            $table->foreignIdFor(Color::class)->constrained()->comment('Идентификатор цвета');
            $table->integer('max_speed')->nullable()->comment('Максимальная скорость');
            $table->foreignIdFor(Body::class)->constrained()->comment('Идентификатор кузова');
            $table->integer('year')->comment('Год выпуска');
            $table->boolean('used')->nullable()->comment('Подержаный');
            $table->string('owner_phone', 32)->nullable()->comment('Телефон владельца');
            $table->foreignIdFor(Shop::class)->nullable()->constrained()->comment('Идентификатор магазина');
            $table->decimal('price', 12, 2)->comment('Цена');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
