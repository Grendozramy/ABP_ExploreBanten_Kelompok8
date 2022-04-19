<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Alam',
            'slug' => 'alam',
            'image' => 'jkXAxHQ7EfuqntKs4eEwiz1Wwvf3pe05KT5GU9Dx.png',
            'title' => 'Destinasi Wisata Alam di Banten',
            'description' => 'Macam-Macam Wisata Alam di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Category::create([
            'name' => 'Budaya',
            'slug' => 'budaya',
            'image' => 'JqDokPFFnlp1skea19TlqeCfZnlskCuBdkRpKTJ3.png',
            'title' => 'Destinasi Wisata Budaya di Banten',
            'description' => 'Macam-Macam Budaya di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Category::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner',
            'image' => 'iulPMoJnHF8xQLZXMCzzNpIUwrhDWUIotprucP2D.png',
            'title' => 'Destinasi Wisata Kuliner di Banten',
            'description' => 'Macam-Macam Kuliner di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);
    }
}
