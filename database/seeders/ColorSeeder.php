<?php

namespace Database\Seeders;

use App\Models\Color;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $colors = [
            'Blanco',
            'Azul',
            'Rojo',
            'Negro'
        ];

        foreach ($colors as $color) {
            Color::create([
                'Color_Description' => $color
            ]);
        }

    }
}
