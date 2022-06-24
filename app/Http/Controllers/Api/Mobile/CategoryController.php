<?php

namespace App\Http\Controllers\Api\Mobile;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $name = $request->input('name');
        $slug = Str::slug($request->name, '-');
        $image = $request->input('image');
        $title = $request->input('title');
        $description = $request->input('description');

        if($id)
        {
            $kategori = Category::with(['places.category', 'places.images'])->find($id);

            if($kategori)
                return ResponseFormatter::success(
                    $kategori,
                    'Data kategori berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data kategori tidak ada',
                    404
                );
        }

        $kategori = Category::with(['places.category', 'places.images']);

        if($name)
            $kategori->where('name', 'like', '%' . $name . '%');

        if($slug)
            $kategori->where('slug', 'like', '%' . $slug . '%');

        if($image)
            $kategori->where('image', 'like', '%' . $image . '%');

        if($title)
            $kategori->where('title', 'like', '%' . $title . '%');

        if($description)
            $kategori->where('description', 'like', '%' . $description . '%');
            

        return ResponseFormatter::success(
            $kategori->paginate($limit),
            'Data list kategori berhasil diambil'
        );
    }
}