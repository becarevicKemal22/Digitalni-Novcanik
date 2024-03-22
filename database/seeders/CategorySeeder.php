<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $undefinedCategory = Category::create([
            "ime" => "neodređeno",
            "boja" => "#000000",
        ]);
        $undefinedCategory->save();
    }
}
