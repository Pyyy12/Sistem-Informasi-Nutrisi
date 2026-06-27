<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\NutritionCalculation;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $history = NutritionCalculation::latest()->take(5)->get();
        return view('nutrition.index', compact('foods', 'history'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'selected_foods' => 'required|array',
            'weight' => 'required|array'
        ]);

        $totalCalories = 0;
        $totalProtein = 0;
        $totalFat = 0;
        $totalCarbohydrate = 0;

        foreach ($request->selected_foods as $foodId) {
            $food = Food::find($foodId);
            // Ambil porsi berat makanan dalam gram yang diinput user
            $weight = $request->weight[$foodId] ?? 0; 

            if ($food && $weight > 0) {
                // Formula: (Nilai gizi / 100) * berat porsi masukan
                $totalCalories += ($food->calories / 100) * $weight;
                $totalProtein += ($food->protein / 100) * $weight;
                $totalFat += ($food->fat / 100) * $weight;
                $totalCarbohydrate += ($food->carbohydrate / 100) * $weight;
            }
        }

        // Standar minimal MBG Sekali Makan Anak Sekolah (Kemenkes/BGN): Energi minimal 550 kkal, Protein 18g
        $status = ($totalCalories >= 550 && $totalProtein >= 18) ? 'Memenuhi Standar MBG' : 'Belum Memenuhi Standar';

        NutritionCalculation::create([
            'menu_name' => $request->menu_name,
            'total_calories' => round($totalCalories, 2),
            'total_protein' => round($totalProtein, 2),
            'total_fat' => round($totalFat, 2),
            'total_carbohydrate' => round($totalCarbohydrate, 2),
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Perhitungan berhasil disimpan!');
    }
}