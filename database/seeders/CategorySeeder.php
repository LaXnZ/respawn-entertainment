<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;


class CategorySeeder extends Seeder
{
    public function run()
    {
        //i need to create 3 realistic categories, use faker
        $faker = \Faker\Factory::create();
        
        for($i = 0; $i < 3; $i++){
            $category = Category::create([
                'name' => $faker->word,
                'slug' => $faker->slug
            ]);
            
     
            for($j = 0; $j < 5; $j++){
                Product::create([
                    'name' => $faker->word,
                    'slug' => $faker->slug,
                    'short_description' => $faker->text,
                    'description' => $faker->paragraph,
                    'regular_price' => $faker->numberBetween(10, 500),
                    'SKU' => 'DIGI'.$faker->unique()->numberBetween(100, 500),
                    'stock_status' => 'instock',
                    'quantity' => $faker->numberBetween(100, 200),
                    'image' => 'digital_'.$faker->unique()->numberBetween(1, 22).'.jpg',
                    'category_id' => $category->id
                ]);
            }
        }
        
    }
}