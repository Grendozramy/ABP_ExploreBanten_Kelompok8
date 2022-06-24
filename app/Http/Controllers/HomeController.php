<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $sliders = Slider::with('images')->latest()->get();
        $places = Place::with('category', 'images')->latest()->get();
        $places = Place::latest()->paginate(3);
        $places1 = Place::all();
        $category = Category::with('places.category', 'places.images')->get();
        $categoryf = Category::all();
        return view('pages.home', compact('sliders', 'places', 'places1', 'category' ,'categoryf'));
    }
}