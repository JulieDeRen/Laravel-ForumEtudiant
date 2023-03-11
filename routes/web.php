<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;

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



/* ---- Controller ---- */
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/about-us', [Controller::class, 'about'])->name('about-us');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');


/* ---------Controller / Draft template Element Pages --------- */
Route::get('/blog', [Controller::class, 'blog'])->name('blog');
Route::get('/course-details', [Controller::class, 'courseDetails'])->name('course-details');
Route::get('/courses', [Controller::class, 'courses'])->name('courses');
Route::get('/elements', [Controller::class, 'elements'])->name('elements');
Route::get('/single-blog', [Controller::class, 'singleBlog'])->name('single-blog');


/* ------ UserController ------ */
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
// choix du nom de la route
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/create', [UserController::class, 'store'])->name('user.store');
// Edit == update
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
// Put pour update
Route::put('/edit/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/edit/{user}', [UserController::class, 'destroy'])->name('user.delete');


