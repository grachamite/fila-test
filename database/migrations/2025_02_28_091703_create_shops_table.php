<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 64)->comment('Название');
            $table->string('description', 256)->comment('Описание');
            $table->string('address', 256)->nullable()->comment('Адрес');
            $table->string('email', 256)->nullable()->comment('Email');
            $table->foreignIdFor(City::class)->constrained()->comment('Идентификатор города');
            $table->decimal('latitude', 9, 6)->nullable()->comment('Широта');
            $table->decimal('longitude', 9, 6)->nullable()->comment('Долгота');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
