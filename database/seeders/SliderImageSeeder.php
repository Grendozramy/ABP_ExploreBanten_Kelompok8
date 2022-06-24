<?php

namespace Database\Seeders;

use App\Models\PlaceImage;
use App\Models\SliderImage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SliderImage::create([
            'slider_id' => '1',
            'image' => 'BcUUo8sRzBdMd1RTSm1pikBnucVChZIPF6DPcOCL.jpg',   
        ]);

        SliderImage::create([
            'slider_id' => '2',
            'image' => 'qkftgLMF2TPHn5c7aNePiyPaCY3Sq6TTJqDCwOoG.png',
        ]);

        SliderImage::create([
            'slider_id' => '3',
            'image' => 'za9aVkTvEnH4N6mJCvR2CRin5uiA7wNOQgg5GKOj.jpg',   
        ]);

    }
}
