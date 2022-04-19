<?php

namespace Database\Factories;

use App\Models\Place;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlaceImage>
 */
class PlaceImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'place_id' => Place::all()->random()->id,
            'image' => 'https://picsum.photos/300/300?nocache='.microtime(),
            'created_at' => Carbon::now()->toDateTimeString(),  
        ];
    }
}
