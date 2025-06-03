<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cup;
use App\Models\Category;

class CupSeeder extends Seeder
{
    public function run()
    {
        Cup::truncate();

        $categories = Category::all();
        $categoryId = $categories->random()->id;    

        for ($i = 1; $i <= 6; $i++) {
            Cup::create([
                'name' => "كوب رقم $i",
                'description' => "وصف رائع لكوب رقم $i",
                'price' => rand(10, 30),
                'image' => 'images/cups/default.png',
                'stock' => rand(5, 20),
                'category_id' => $categoryId, // مهم جدًا!
            ]);
        }
    }
}
