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
            'image' => '13y0RhjZTWkun01iwvWrVrIfCe9AODAa4Vui65WX.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '2',
            'image' => 'aWJWp4FDeQdiyzCiWfS22CnQ0967llsXhRA36h0N.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '3',
            'image' => 'Hmmw69Twnjj4du77JGUsSDe4sPlwXjnGrHSXhzoq.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '4',
            'image' => 'jlQo9j7u6tE9vtBNRmzNmL4BiDw1Xu5IRz9ZKp3F.png',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '5',
            'image' => 'Resep_Masakan_Sate_Bandeng_(Banten).jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);

        PlaceImage::create([
            'place_id' => '6',
            'image' => 'Kasepuhan-Cisungsang-1024x576.jpg',
            'created_at' => Carbon::now()->toDateTimeString(),     
        ]);
    }
}
