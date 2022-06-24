<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ResponseFormatter;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $title2 = $request->input('title2');


        if($id)
        {
            $slider = Slider::with(['images'])->find($id);

            if($slider)
                return ResponseFormatter::success(
                    $slider,
                    'Data slider berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data slider tidak ada',
                    404
                );
        }

        $slider = Slider::with(['images']);

        if($title)
            $slider->where('title', 'like', '%' . $title . '%');

        if($title2)
            $slider->where('title', 'like', '%' . $title . '%');

        return ResponseFormatter::success(
            $slider->paginate($limit),
            'Data list kategori berhasil diambil'
        );
    }
}