<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index($slug) 
    {
        $places = Place::all();
        $categoryf = Category::all();
        $category = Category::with('places.category', 'places.images')->get();
        $items = Place::with('category', 'images')->where('slug', $slug) ->get();
        return view('pages.blog', compact('items', 'category', 'categoryf','places'));
    }

    public function direction($location) 
    {
        $categoryf = Category::all();
        $items = Place::with('category', 'images')->where('location', $location)->get();
        return view('pages.maps1', compact('categoryf', 'items'));;
    }
}