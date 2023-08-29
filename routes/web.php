<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/oneq',[test::class,'one']);
// Route::post('/register', [AuthController::class, 'register']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group([
//     'middleware' => 'auth',
//     ],function (){
    Route::resource('/subjects',SubjectController::class);
// }

// );
Route::resource('/notifications',NotificationController::class);
Route::resource('/answers',AnswerController::class);
Route::resource('/categories',CategoryController::class);
Route::resource('/questions',QuestionController::class);
Route::resource('/specializations',SpecializationController::class);
Route::resource('/terms',TermsController::class);

