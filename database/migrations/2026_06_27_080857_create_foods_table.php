<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            table->id();
            $table->string('name'); // Contoh: Nasi Putih, Ayam Goreng, Capcay
            $table->string('category'); // Karbohidrat, Lauk Hewani, Lauk Nabati, Sayur, Buah
            $table->float('calories'); // per 100 gram (kkal)
            $table->float('protein'); // per 100 gram (gram)
            $table->float('fat'); // per 100 gram (gram)
            $table->float('carbohydrate'); // per 100 gram (gram)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};