<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nutrition_calculations', function (Blueprint $table) {
            table->id();
            $table->string('menu_name'); // Nama paket menu, misal: "Paket MBG SD Sehat 1"
            $table->float('total_calories');
            $table->float('total_protein');
            $table->float('total_fat');
            $table->float('total_carbohydrate');
            $table->string('status'); // "Memenuhi Standar" atau "Kurang Gizi"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_calculations');
    }
};