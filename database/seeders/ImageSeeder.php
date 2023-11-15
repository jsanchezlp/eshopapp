<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'Img_EntityID' => 1,
                'Img_EntityTypeID' => 2
            ],
            [
                'Img_EntityID' => 2,
                'Img_EntityTypeID' => 2
            ],
            [
                'Img_EntityID' => 1,
                'Img_EntityTypeID' => 3
            ],
            [
                'Img_EntityID' => 2,
                'Img_EntityTypeID' => 3
            ],
            [
                'Img_EntityID' => 3,
                'Img_EntityTypeID' => 3
            ],
            [
                'Img_EntityID' => 4,
                'Img_EntityTypeID' => 3
            ],
            [
                'Img_EntityID' => 5,
                'Img_EntityTypeID' => 3
            ],
            [
                'Img_EntityID' => 6,
                'Img_EntityTypeID' => 3
            ],
            [
                'Img_EntityID' => 7,
                'Img_EntityTypeID' => 3
            ],
        ];

        foreach ($images as $image) {
            Image::factory(1)->create($image);
        }
    }
}
