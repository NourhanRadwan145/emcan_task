<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/about', function () {
    return view('about');
})->name('about');


// Authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Registration routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::resource('courses.lessons', LessonController::class)->shallow();
    Route::post('courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::get('enrolled-courses', [CourseController::class, 'enrolledCourses'])->name('enrolled-courses');
    Route::get('/search-results', [SearchController::class, 'index'])->name('search.results');

});


// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('lessons', LessonController::class);
});

