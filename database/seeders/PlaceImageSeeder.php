<?php

namespace Database\Seeders;

use App\Models\PlaceImage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlaceImage::create([
            'place_id' => '1',
            'image' => 'A1dREDToottZ1TbLfFWPbYtVJhduWZsdLzMJ9h5R.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '2',
            'image' => 'FooDgqgGwreukIDJhiqancJDY9witD9jvUs8UgMP.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '3',
            'image' => 'Myb5U1sHWYbgHB2FxIC8N2siVteD4f4xeusoZyG3.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '4',
            'image' => 'r47d30MlaeNGAFefCWXZTgSTIMfFPXFXvnFAksBj.webp',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '5',
            'image' => 'XHfZySsFeBiook34PlNOS2leVKBubEVvnWlwyItF.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '6',
            'image' => 'sT3GGEswPlqqS1k6mAJ9UX1LQFIDpYrVpZebmkLb.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);
    }
}
