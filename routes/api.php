<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\test;
use App\Http\Controllers\UserController;
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
Route::post('/edit-profile',[UserController::class,'editProfile']);

Route::get('/sliders',[SliderController::class,'sliders']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/categories',[CategoryController::class,'index']);
Route::get('/category/{uuid}',[CategoryController::class,'categoryById']);//collage of category
Route::get('/collages',[CollageController::class,'index']);//all collage



Route::middleware(['authenticat'])->group(function () {
  
Route::get('/specializationOfCollage/{uuid}',[CollageController::class,'collageById']);
Route::get('/subjects/{uuid}',[CollageController::class,'subjects']);
Route::post('/favourite-add/{uuid}',[FavoriteController::class,'create']);
Route::get('/user-favourites',[FavoriteController::class,'favouritesOfUser']);
Route::get('/terms/{type}/{collage}',[TermsController::class,'terms']);
Route::get('/questions/{term}',[QuestionController::class,'questionsOfTerm']);
});
Route::get('/oneq',[test::class,'one']);

