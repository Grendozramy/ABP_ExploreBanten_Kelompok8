<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'image' => 'https://picsum.photos/300/300?nocache='.microtime(),
            'title' => $this->faker->sentence(mt_rand(2,7)),
            'title2' => $this->faker->sentence(mt_rand(4,10)),
            'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
