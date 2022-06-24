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
            'image' => '82aH3h6P7TM6NtnaenvgQnby1fAZvLZYyRE6eRQe.png',
            'title' => 'Destinasi Wisata Alam di Banten',
            'description' => 'Macam-Macam Wisata Alam di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Category::create([
            'name' => 'Budaya',
            'slug' => 'budaya',
            'image' => 'mlD6pKO1qlYy64QlnPwz4rk2uANt0PdBu9vQe5SM.png',
            'title' => 'Destinasi Wisata Budaya di Banten',
            'description' => 'Macam-Macam Budaya di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        Category::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner',
            'image' => '3R35K1u51YS1E0lconjSrn8ASyL3iPWFZdODlclZ.png',
            'title' => 'Destinasi Wisata Kuliner di Banten',
            'description' => 'Macam-Macam Kuliner di Banten',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);
    }
}
