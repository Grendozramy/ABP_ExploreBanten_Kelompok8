<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //route login
    Route::post('/login', App\Http\Controllers\Api\Mobile\LoginController::class, ['as' => 'admin']);

    //group route with middleware "auth:api"
    Route::group(['middleware' => 'auth:api'], function() {

        //route user logged in
        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name('user');

        //route logout
        Route::post('/logout', App\Http\Controllers\Api\Mobile\LogoutController::class, ['as' => 'admin']);

    });

});

//group route with prefix "Mobile"
Route::prefix('mobile')->group(function () {

    //route categories index
    Route::get('/categories', [App\Http\Controllers\Api\Mobile\CategoryController::class, 'index']);

    //route categories show
    Route::get('/categories/{slug?}', [App\Http\Controllers\Api\Mobile\CategoryController::class, 'show']);

    //route places index
    Route::get('/places', [App\Http\Controllers\Api\Mobile\PlaceController::class, 'index']);

    //route places show
    Route::get('/places/{slug?}', [App\Http\Controllers\Api\Mobile\PlaceController::class, 'show']);

    //route all places index
    Route::get('/all_places', [App\Http\Controllers\Api\Mobile\AllPlaceController::class, 'index']);

    //route sliders
    Route::get('/sliders', [App\Http\Controllers\Api\Mobile\SliderController::class, 'index']);
});