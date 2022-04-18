<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PlacesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\BlogsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/tours', [ToursController::class, 'index']);
Route::get('/tours/{slug}', [ToursController::class, 'show']);
Route::get('/blogs/{slug}', [BlogsController::class, 'index']);
Route::get('/maps', [ToursController::class, 'maps']);
Route::get('/maps/{location}', [BlogsController::class, 'direction']);


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
        Route::get('/', [DashboardController::class, 'index'])-> name('dashboard');

        Route::resource('category', CategoryController::class);
        Route::resource('place', PlacesController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('user', UserController::class);
    });

Auth::routes();
