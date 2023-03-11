<?php

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

// ajouter welcome à la fonction de base de laravel '/'
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test-abc', function (){
    return view('test');
});

use App\Http\Controllers\MyResumeController;

Route::get('/', [MyResumeController::class, 'index']);
Route::get('/contact', [MyResumeController::class, 'contact']);
Route::post('/contact', [MyResumeController::class, 'contactForm']);
Route::get('/portfoliodetails', [MyResumeController::class, 'portfoliodetails']);
Route::get('/article', [MyResumeController::class, 'article']);
