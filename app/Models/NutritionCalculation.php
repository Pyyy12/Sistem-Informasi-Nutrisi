<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionCalculation extends Model
{
    protected $fillable = ['menu_name', 'total_calories', 'total_protein', 'total_fat', 'total_carbohydrate', 'status'];
}