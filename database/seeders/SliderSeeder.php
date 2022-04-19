<?php

namespace Database\Seeders;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'user_id' => '1',
            'image' => 'GnC4UsDSg5Ppdw9jOPNdoyV54VwtcV80Y8xaEIXQ.jpg',
            'title' => 'Kenikmatan Kuliner khas Banten',
            'title2' => 'Yuk! Cicipi Kuliner Khas Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Slider::create([
            'user_id' => '1',
            'image' => '5weZcNI7lQ6OajMQ5xOEUFPNuRVtiWZOxiVSr7X4.jpg',
            'title' => 'Wisata Banten',
            'title2' => 'Nikmati dan Jelajahi Layaknya Petualang',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Slider::create([
            'user_id' => '1',
            'image' => 'gdMU6Z17w3Vxb9s32aCgvJqSDr5iU2rmnkuHCGYg.jpg',
            'title' => 'Banten Penuh Akan Budaya',
            'title2' => 'Mari Lestarikan Kebudayaan yang ada di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);
    }
}
