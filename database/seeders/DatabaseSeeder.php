<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        
        Storage::deleteDirectory('images');
        // Storage::deleteDirectory('products');

        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories'); // no ejecutar

        Storage::makeDirectory('products');

        $this->call(CategorySeeder::class);
        // $this->call(EntityTypeSeeder::class); // no ejecutar
        
        // $this->call(ImageSeeder::class);
        $this->call(SubcategorySeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);

        $this->call(ProductColorSeeder::class);

        $this->call(SizeSeeder::class);
    }
}
