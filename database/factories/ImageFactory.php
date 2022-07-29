<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'user_id' => User::factory()->create(),
            'description' => fake()->text(),
            'image_path' => fake()->numberBetween($min = 1, $max = 9).'.jpg', 


        ];
    }
}
