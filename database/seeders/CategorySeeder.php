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
            "ime" => "Neodređeno",
            "boja" => "#000000",
        ]);
        $undefinedCategory->save();
        $hrana = Category::create([
            "ime" => "Hrana",
            "boja" => "#f5b802",
        ]);
        $hrana->save();
        $transport = Category::create([
            "ime" => "Transport",
            "boja" => "#0046a8",
        ]);
        $transport->save();
        $namirnice = Category::create([
            "ime" => "Namirnice",
            "boja" => "#2dad4f",
        ]);
        $namirnice->save();
    }
}
