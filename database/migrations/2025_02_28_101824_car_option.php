<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Car;
use App\Models\Option;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_option', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Car::class)->constrained()->comment('Идентификатор автомобиля');
            $table->foreignIdFor(Option::class)->constrained()->comment('Идентификатор опции');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_option');
    }
};
