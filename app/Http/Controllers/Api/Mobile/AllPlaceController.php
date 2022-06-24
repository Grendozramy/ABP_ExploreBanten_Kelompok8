<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Models\Place;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ResponseFormatter;

class AllPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $title = $request->input('title');
        $title1 = $request->input('title1');
        $slug = Str::slug($request->name, '-');
        $excerpt = $request->input('excerpt');
        $description = $request->input('description');
        $phone = $request->input('phone');
        $website = $request->input('website');
        $office_hours = $request->input('office_hours');
        $address = $request->input('address');
        $address1 = $request->input('address1');
        $location = $request->input('location');
        $category = $request->input('category');

        if($id)
        {
            $places = Place::with(['category', 'images'])->find($id);

            if($places)
                return ResponseFormatter::success(
                    $places,
                    'Data places berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data places tidak ada',
                    404
                );
        }

        $places = Place::with(['category', 'images']);

        if($title)
            $places->where('title', 'like', '%' . $title . '%');

        if($description)
            $places->where('description', 'like', '%' . $description . '%');

        if($title1)
            $places->where('title1', 'like', '%' . $title1 . '%');

        if($slug)
            $places->where('slug', 'like', '%' . $slug . '%');

        if($excerpt)
            $places->where('excerpt', 'like', '%' . $excerpt . '%');

        if($category)
            $places->where('category', $category);

        if($phone)
            $places->where('phone', 'like', '%' . $phone . '%');

        if($website)
            $places->where('website', 'like', '%' . $website . '%');

        if($office_hours)
            $places->where('office_hours', 'like', '%' . $office_hours . '%');

        if($address)
            $places->where('address', 'like', '%' . $address . '%');

        if($address1)
            $places->where('address1', 'like', '%' . $address1 . '%');

        if($location)
            $places->where('location', 'like', '%' . $location . '%');

        return ResponseFormatter::success(
            $places->paginate($limit),
            'Data list places berhasil diambil'
        );
    }
}