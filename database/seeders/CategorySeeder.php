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
        $data = [
            ['category_name'=>'Sweatshirts'],
            ['category_name'=>'Hoodie'],
            ['category_name'=>'Casual Shirts'],
            ['category_name'=>'Pants'],
            ['category_name'=>'Jeans'],
            ['category_name'=>'T-Shirt'],
            ['category_name'=>'Jacket'],
            ['category_name'=>'Blazer'],
            ['category_name'=>'Shorts'],
            ['category_name'=>'Chinos'],
            ['category_name'=>'Accessories'],
            ['category_name'=>'Shoes'],
        ];

        Category::insert($data);
    }
}
