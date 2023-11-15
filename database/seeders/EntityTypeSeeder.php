<?php

namespace Database\Seeders;

use App\Models\EntityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $entitytypes = [
            [
                'EntityT_Name' => 'product'
            ],
            [
                'EntityT_Name' => 'category'
            ],
            [
                'EntityT_Name' => 'subcategory'
            ],
            [
                'EntityT_Name' => 'user'
            ],
        ];

        foreach ($entitytypes as $entitytype) {
            EntityType::create($entitytype);
        }
        
    }
}
