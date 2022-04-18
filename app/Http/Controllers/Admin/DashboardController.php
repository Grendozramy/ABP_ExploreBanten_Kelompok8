<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Place;
use App\Models\Slider;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() 
    {
        $categories = Category::count();
        $places = Place::count();
        $sliders = Slider::count();
        $users = User::count();
        return view('pages.admin.dashboard', compact('categories', 'places', 'sliders', 'users'));
    }
}
