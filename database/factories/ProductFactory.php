<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Supplier;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $prodName = $this->faker->unique()->sentence(2);
        // $prodName = $this->faker->words(3);

        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;

        $brand = $category->brands->random();

        $supplier = Supplier::all()->random();
    

        // if($subcategory->Subcat_Color){
        //     $prodStock = null;
        // } else {
        //     $prodStock = 15;
        // }

        return [
            'Prod_Sku' => $this->faker->unique()->numberBetween(100000, 999999),
            'Prod_Name' => $prodName,
            'Prod_Slug' => Str::slug($prodName),
            'Prod_Description' => $this->faker->text(80),
            // 'Prod_Price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            'Prod_Price' => $this->faker->randomFloat(2, 2, 1000),
            'Prod_Stock' => $this->faker->randomElement([10, 20, 30, 40, 50, 5, 15, 25, 35, 45]),
            'Prod_SuppID' => $supplier->Supp_ID,
            'Prod_BrandID' => $brand->Brand_ID,
            'Prod_SubcatID' => $subcategory->Subcat_ID,
            'Prod_Status' => 1,
        ];
    }
}
