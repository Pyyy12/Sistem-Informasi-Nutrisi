<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Nasi Putih', 'category' => 'Karbohidrat', 'calories' => 130, 'protein' => 2.7, 'fat' => 0.3, 'carbohydrate' => 28],
            ['name' => 'Ayam Goreng', 'category' => 'Lauk Hewani', 'calories' => 260, 'protein' => 25, 'fat' => 17, 'carbohydrate' => 0],
            ['name' => 'Telur Dadar', 'category' => 'Lauk Hewani', 'calories' => 154, 'protein' => 12.4, 'fat' => 10.8, 'carbohydrate' => 0.7],
            ['name' => 'Tempe Bacem', 'category' => 'Lauk Nabati', 'calories' => 160, 'protein' => 10, 'fat' => 5, 'carbohydrate' => 18],
            ['name' => 'Capcay Sayuran', 'category' => 'Sayur', 'calories' => 67, 'protein' => 2, 'fat' => 4, 'carbohydrate' => 7],
            ['name' => 'Pisang Ambon', 'category' => 'Buah', 'calories' => 99, 'protein' => 1.2, 'fat' => 0.2, 'carbohydrate' => 25.8],
        ];

        foreach ($data as $item) {
            Food::create($item);
        }
    }
}