<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 64)->comment('Название');
            $table->string('code', 16)->comment('Код');
            $table->decimal('latitude', 9, 6)->nullable()->comment('Широта');
            $table->decimal('longitude', 9, 6)->nullable()->comment('Долгота');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
