<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;  // Ova linija je potrebna da bi se koristio Category model


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $category=new Category();
        $category->naziv='Biljni caj';

        $category->save();

        $category=new Category();
        $category->naziv='Lekoviti caj';

        $category->save();

        $category=new Category();
        $category->naziv='Vocni caj';

        $category->save();

        $category=new Category();
        $category->naziv='Turski cajevi';

        $category->save();

        $category=new Category();
        $category->naziv='Mesani cajevi';

        $category->save();
    }
}
