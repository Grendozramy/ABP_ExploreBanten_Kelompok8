<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Alam','Budaya','Kuliner']),
            'slug' =>  $this->faker->slug(),
            'image' => 'https://picsum.photos/300/300?nocache='.microtime(),
            'title' => $this->faker->sentence(mt_rand(2,7)),
            'description' => $this->faker->sentence(mt_rand(12,27)),
            'created_at' => Carbon::now()->toDateTimeString(), 
        ];
    }
}
