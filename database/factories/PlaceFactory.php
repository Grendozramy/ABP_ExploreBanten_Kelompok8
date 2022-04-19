<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,7)),
            'slug' => $this->faker->slug(),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'excerpt' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(mt_rand(5,9)),
            'phone' => $this->faker->phoneNumber(),
            'website' => $this->faker->url(),
            'office_hours' => $this->faker->time(), '-', $this->faker->time(),
            'address' => $this->faker->address(),
            'longitude' => $this->faker->latitude($min = -4, $max = -6),
            'latitude' => $this->faker->longitude($min = 104, $max = 107),
            'location' => $this->faker->localCoordinates(),
            'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
