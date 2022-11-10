<?php

use App\Models\Category;
use App\Models\pertanyaanPost;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\pertanyaanPostController;

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
    return view('landingPage', [
        "title" => "Siap, Semangat, Dahysat!"
    ]);
});

Route::get('/home', [pertanyaanPostController::class, 'index']);
Route::get('/home/{pertanyaanPost:slug}', [pertanyaanPostController::class, 'show']);

Route::get('/course', function () {
    return view('course', [
        "title" => "Course"
    ]);
});

Route::get('/bulletin', function () {
    return view('bulletin', [
        "title" => "Bulletin"
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});