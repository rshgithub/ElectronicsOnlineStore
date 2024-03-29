<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // 3 words
            'category_id' => $this->faker->numberBetween(1,10),
            'description' => $this->faker->sentence(5), // 20 words
            'price' => $this->faker->numberBetween(100,1000),
            'status' => $this->faker->numberBetween(0,1),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
