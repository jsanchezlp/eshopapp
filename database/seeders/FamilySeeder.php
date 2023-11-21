<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $families = [
            'Moda Hombre' => [
                'Tendencias y colecciones' => [
                    'Colección de verano',
                    'Lo mas nuevo',
                ],
                'Ropa de hombre por tipo' => [
                    'Abrigos',
                    'Camisas',
                    'Camisetas',
                    'Jeans',
                    'Pantalones',
                    'Polos',
                    'Ropa interior',
                    'Shorts',
                    'Trajes',
                    'Zapatos',
                ],
                'Ropa interior y pijamas' => [
                    'Boxers',
                    'Pijamas',
                    'Ropa interior',
                ],
            ],
            'Moda Mujer' => [
                'Tendencias y colecciones' => [
                    'Colección de verano',
                    'Lo más nuevo',
                    'Comodidad',
                    'Colección otoño invierno',
                ],
                'Ropa de mujer por tipo' => [
                    'Abrigos',
                    'Blusas',
                    'Camisas',
                    'Camisetas',
                    'Jeans',
                    'Pantalones',
                    'Polos',
                    'Ropa interior',
                    'Shorts',
                    'Vestidos',
                    'Zapatos',
                ],
                'Ropa interior y pijamas' => [
                    'Pijamas',
                    'Ropa interior',
                ],
            ],
            'Moda Infantil' => [
                'Tendencias y colecciones' => [
                    'Colección de verano',
                    'Lo mas nuevo',
                    'Colección otoño invierno',
                ],
                'Ropa de niño por tipo' => [
                    'Abrigos',
                    'Camisas',
                    'Camisetas',
                    'Jeans',
                    'Pantalones',
                    'Polos',
                    'Ropa interior',
                    'Shorts',
                    'Zapatos',
                ],
                'Ropa interior y pijamas' => [
                    'Boxers',
                    'Pijamas',
                    'Ropa interior',
                ],
                'Ropa de niña por tipo' => [
                    'Abrigos',
                    'Blusas',
                    'Camisas',
                    'Camisetas',
                    'Jeans',
                    'Pantalones',
                    'Polos',
                    'Ropa interior',
                    'Shorts',
                    'Vestidos',
                    'Zapatos',
                ],
            ],
        ];


        foreach ($families as $family => $categories) {
            
            $family = Family::create([
                'Family_Name' => $family,
            ]);

            foreach ($categories as $category => $subcategories) {
                
                $category = Category::create([
                    'Cate_Name' => $category,
                    'Cate_Slug' => Str::slug($category),
                    'Cate_Family_ID' => $family->id,
                ]);

                foreach ($subcategories as $subcategory) {
                    Subcategory::create([
                        'Subcat_Name' => $subcategory,
                        'Subcat_Slug' => Str::slug($subcategory),
                        'Subcat_CatID' => $category->id,
                    ]);
                }

            }

        }

    }
}
