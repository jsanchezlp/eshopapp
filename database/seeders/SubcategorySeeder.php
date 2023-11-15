<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use App\Models\SubcategoryImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Factories\SubcategoryImagesFactory;

use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $subcategories = [
            // Ropa para Caballero
            [
                'Subcat_Name' => 'Camisas y Playeras',
                'Subcat_Slug' => Str::slug('Camisas y Playeras'),
                'Subcat_CatID' => 1,
                'Subcat_Color' => true,
                'Subcat_Size' => false
            ],
            [
                'Subcat_Name' => 'Chamarras y Abrigos',
                'Subcat_Slug' => Str::slug('Chamarras y Abrigos'),
                'Subcat_CatID' => 1,
                'Subcat_Color' => true,
                'Subcat_Size' => false
            ],
            [
                'Subcat_Name' => 'Ropa Deportiva',
                'Subcat_Slug' => Str::slug('Ropa Deportiva'),
                'Subcat_CatID' => 1,
                'Subcat_Color' => true,
                'Subcat_Size' => true
            ],
            // Ropa para Dama
            [
                'Subcat_Name' => 'Blusas y Playeras',
                'Subcat_Slug' => Str::slug('Blusas y Playeras'),
                'Subcat_CatID' => 2,
                'Subcat_Color' => true,
                'Subcat_Size' => true
            ],
            [
                'Subcat_Name' => 'Faldas y Vestidos',
                'Subcat_Slug' => Str::slug('Faldas y Vestidos'),
                'Subcat_CatID' => 2,
                'Subcat_Color' => false,
                'Subcat_Size' => false
            ],
            // Ropa Unisex
            [
                'Subcat_Name' => 'Suéteres',
                'Subcat_Slug' => Str::slug('Suéteres'),
                'Subcat_CatID' => 3,
                'Subcat_Color' => true,
                'Subcat_Size' => false
            ],
            // Ropa para Niños
            [
                'Subcat_Name' => 'Pantalones y Playeras',
                'Subcat_Slug' => Str::slug('Pantalones y Playeras'),
                'Subcat_CatID' => 4,
                'Subcat_Color' => true,
                'Subcat_Size' => true
            ],
        ];

        foreach ($subcategories as $subcategory) {
            $subcategory = Subcategory::create($subcategory);

            SubcategoryImages::factory()->create([
                'Img_EntityID' => $subcategory->id,
                'Img_EntityTypeID' => 3,
            ]);

        }
        
    }
}
