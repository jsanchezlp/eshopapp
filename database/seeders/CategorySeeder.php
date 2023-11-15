<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;

use App\Models\CategoryImages;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Factories\CategoryImagesFactory;

use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $categories = [
            [
                'Cate_Name' => 'Ropa para Caballero',
                'Cate_Slug' => Str::slug('Ropa para Caballero'),
            ],
            [
                'Cate_Name' => 'Ropa para Dama',
                'Cate_Slug' => Str::slug('Ropa para Dama'),
            ],
            [
                'Cate_Name' => 'Ropa Unisex',
                'Cate_Slug' => Str::slug('Ropa Unisex'),
            ],
            [
                'Cate_Name' => 'Ropa para Niños',
                'Cate_Slug' => Str::slug('Ropa para Niños'),
            ],
        ];

        foreach ($categories as $category) {

            $category = Category::create($category);
            // dd($category);
            $brands = Brand::factory(2)->create();

           CategoryImages::factory()->create([
            'Img_EntityID' => $category->id,
            'Img_EntityTypeID' => 2,
           ]);

            // dd($categoryImageUrl);

            // Image::create([
            //     'Img_EntityID' => $category->id,
            //     'Img_EntityTypeID' => 2,
            //     'Img_Path' => $categoryImageUrl
            // ]);

            // dd($brands);

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
                // dd($brand->category);
            }

        }

    }
}
