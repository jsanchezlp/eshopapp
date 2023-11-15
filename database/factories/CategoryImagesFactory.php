<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = null;


    public function definition(): array
    {
        return [
            'Img_Path' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false),
        ];
    }
}
