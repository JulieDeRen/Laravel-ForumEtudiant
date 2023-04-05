<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DocumentController;

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


/* ---------BlogController --------- */
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('/blog-create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog-create', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('/course-details', [BlogController::class, 'courseDetails'])->name('course-details');
Route::get('/courses', [BlogController::class, 'courses'])->name('courses');
Route::get('/elements', [BlogController::class, 'elements'])->name('elements');
Route::get('/single-blog', [BlogController::class, 'singleBlog'])->name('single-blog');
Route::get('/blog-edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
// Put pour update
Route::put('/blog-edit/{blog}', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('/blog-edit/{blog}', [BlogController::class, 'destroy'])->name('blog.delete')->middleware('auth');


/* ------ UserController ------ */
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
Route::get('/student/{user}', [UserController::class, 'showstudent'])->name('student.show')->middleware('auth');
// choix du nom de la route
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/create', [UserController::class, 'store'])->name('user.store');
// Edit == update
Route::get('/student-edit/{user}', [UserController::class, 'edit'])->name('student.edit')->middleware('auth');
// Put pour update
Route::put('/student-edit/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('/edit/{user}', [UserController::class, 'destroy'])->name('user.delete')->middleware('auth');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authentification']);
Route::get('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');



/* ------ StudentController ------ */
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
// Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
// choix du nom de la route
Route::get('/student-create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student-create', [StudentController::class, 'store'])->name('student.store');
// Edit == update est sur le controller user
// Put pour update
Route::put('/student-edit/{student}', [StudentController::class, 'update'])->name('student.update')->middleware('auth');
Route::delete('/student-edit/{student}', [StudentController::class, 'destroy'])->name('student.delete')->middleware('auth');


/* ------ EmployerController ------ */
Route::get('/employer-index', [EmployerController::class, 'index'])->name('employer.index');
Route::get('/employer-show/{employer}', [EmployerController::class, 'show'])->name('employer.show');
// choix du nom de la route
Route::get('/employer-create', [EmployerController::class, 'create'])->name('employer.create');
Route::post('/employer-create', [EmployerController::class, 'store'])->name('employer.store');
// Edit == update
Route::get('/employer-edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
// Put pour update
Route::put('/employer-edit/{employer}', [EmployerController::class, 'update'])->name('employer.update');
Route::delete('/employer-edit/{employer}', [EmployerController::class, 'destroy'])->name('employer.delete');


/* ------ InternshipController ------ */
Route::get('/internship-index', [InternshipController::class, 'index'])->name('internship.index');
Route::get('/internship-show/{internship}', [InternshipController::class, 'show'])->name('internship.show');
// choix du nom de la route
Route::get('/internship-create', [InternshipController::class, 'create'])->name('internship.create');
Route::post('/internship-create', [InternshipController::class, 'store'])->name('internship.store');
// Edit == update
Route::get('/internship-edit/{internship}', [InternshipController::class, 'edit'])->name('internship.edit');
// Put pour update
Route::put('/internship-edit/{internship}', [InternshipController::class, 'update'])->name('internship.update');
Route::delete('/internship-edit/{internship}', [InternshipController::class, 'destroy'])->name('internship.delete');

/* ------ DocumentController ------ */
// Auth is necessary for all classes of DocumentController
Route::get('/document', [DocumentController::class, 'index'])->name('document.index')->middleware('auth');
// choix du nom de la route
Route::get('/create-document', [DocumentController::class, 'create'])->name('document.create')->middleware('auth');
Route::post('/create-document', [DocumentController::class, 'store'])->name('document.store')->middleware('auth');
// Edit == update
Route::get('/edit-document/{document}', [DocumentController::class, 'edit'])->name('document.edit')->middleware('auth');
// Put pour update
Route::put('/edit-document/{document}', [DocumentController::class, 'update'])->name('document.update')->middleware('auth');
Route::delete('/document/{document}', [DocumentController::class, 'destroy'])->name('document.delete')->middleware('auth');




/*------------ ImageController --------------- */
/*Route::controller(ImageController::class)->group(function(){
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
});*/

/* --------- Authentification -------------- */
/*

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
Route::post('registration', [CustomAuthController::class, 'store']);
Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentification']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');

*/

