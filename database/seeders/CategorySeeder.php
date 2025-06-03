<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::truncate(); // تفرغ الجدول لو فيه داتا

        $categories = ['Default'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
