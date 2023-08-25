<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\test;
use App\Models\Collage;
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
Route::get('/test-online', function () {
    dd('i am online ^_^');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/sliders',[SliderController::class,'sliders']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/categories',[CategoryController::class,'index']);
Route::get('/category/{uuid}',[CategoryController::class,'categoryById']);

Route::get('/collages',[CollageController::class,'index']);
Route::get('/specializationOfCollage/{uuid}',[CollageController::class,'collageById'])->middleware('auth:sanctum');
Route::get('/subjects/{uuid}',[CollageController::class,'subjects']);
Route::post('/favourite-add/{uuid}',[FavoriteController::class,'create']);
Route::get('/user-favourites',[FavoriteController::class,'favouritesOfUser']);

