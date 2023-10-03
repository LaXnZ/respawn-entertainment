<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;


class CategorySeeder extends Seeder
{
    public function run()
    {
        //Category::factory(10)->create();
        Product::factory(16)->create();
    }
}
