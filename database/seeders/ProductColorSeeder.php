<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Product;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::whereHas('subcategory', function(Builder $query){
            $query->where('Subcat_Color', true)
                  ->where('Subcat_Size', false);
        })->get();

        foreach ($products as $product) {
            $product->colors()->attach([
                1 => [
                    'Prod_Stock' => 10
                ],
                2 => [
                    'Prod_Stock' => 10
                ],
                3 => [
                    'Prod_Stock' => 10
                ],
                4 => [
                    'Prod_Stock' => 10
                ]
            ]);
        }

    }
}
