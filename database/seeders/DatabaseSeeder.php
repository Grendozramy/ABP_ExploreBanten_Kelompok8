<?php

namespace Database\Seeders;

use App\Models\SliderImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(PlaceImageSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SliderImageSeeder::class);
    }
}
