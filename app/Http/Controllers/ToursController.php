<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index(Request $request)
    {  
        $data = Place::with('category', 'images')->where('title', $request->search)
        ->orWhere('title','like','%' .$request->search. '%')->paginate(3);
        $categoryf = Category::all();
        
        return view('pages.tours', compact('data', 'categoryf'));
    }

    public function maps()
    { 
        $categoryf = Category::all();
        $places = Place::all();
        return view('pages.maps', compact('categoryf', 'places'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)

    {   $categoryf = Category::all();
        $category = Category::with('places.category', 'places.images')->where('slug', $slug)->get();
        $places = Place::latest()->paginate(6);
        if($category) {
            
            return view('pages.tour', compact('category','places', 'categoryf'));
        }
    }
}
