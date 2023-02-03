<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesForAdminController;
use App\Http\Controllers\CourseSearchController;
use App\Http\Controllers\CourseTypesController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\GetCourseController;
use App\Http\Controllers\GetRelatedMaterialToCourse;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SubCategoriesForAdminController;
use App\Http\Controllers\UpdatePostion;
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



Auth::routes();

Route::middleware(['courseTypes'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/', function () {
    
        return view('welcome');
    })->name('index');

    //? Route for contact page
    Route::resource('/contact', App\Http\Controllers\ContactController::class);

    //? Route for courses page
    Route::resource(
        '/courses',
        App\Http\Controllers\CoursesController::class
    );
});




//? Route for admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

//? Route for users for admin 
Route::resource('/admin/users', App\Http\Controllers\UsersForAdminController::class);


//? Route for categories for admin
Route::resource('/admin/categories', CategoriesForAdminController::class);

//? Route for sub-categories for admin

Route::resource('/admin/subcategories', SubCategoriesForAdminController::class);
Route::resource('/admin/materials', MaterialController::class);
Route::post('/upload-image-ck', ImageController::class)->name('ckeditor.upload');
Route::post('/update-position', UpdatePostion::class)->name('update.position');
Route::resource('/dashboard/profile', DashboardProfileController::class);
Route::resource('/dashboard/courseTypes', CourseTypesController::class);
Route::get('search', CourseSearchController::class)->name('courses.search');
Route::resource('course', GetCourseController::class);
Route::get('course/{courseId}/material/{materialId}', GetRelatedMaterialToCourse::class)->name('show.related.materials');
// Falback route
Route::fallback(function () {
    return view('layouts.404');
});
