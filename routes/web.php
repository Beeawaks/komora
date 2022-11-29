<?php

use App\Http\Controllers\BulletinController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Models\Category;
use App\Models\pertanyaanPost;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\pertanyaanPostController;
use App\Http\Controllers\RegisterController;
use App\Models\Bulletin;
use App\Models\Course;

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

// Route::get('/', function () {
//     return view('landingPage', [
//         "title" => "Siap, Semangat, Dahysat!"
//     ]);
// });
Route::get('/', [pertanyaanPostController::class, 'index']);

Route::get('/home', [pertanyaanPostController::class, 'index']);
Route::get('/home/{pertanyaanPost:slug}', [pertanyaanPostController::class, 'show']);

Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{course:slug}', [CourseController::class, 'show']);

Route::get('/bulletin', [BulletinController::class, 'index']);
Route::get('/bulletin/{bulletin:slug}', [BulletinController::class, 'show']);




// Route::get('/course', function () {
//     return view('course', [
//         "title" => "Course",
//         'active' => 'course'
//     ]);
// });

// Route::get('/bulletin', function () {
//     return view('bulletin', [
//         "title" => "Bulletin",
//         'active' => 'bulletin'
//     ]);
// });

// Route::get('/categories', function(){
//     return view('categories', [
//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('home', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

Route::get('/authors/{author:username}', function(User $author){
    return view('home', [
        'title' => "Post By Author : $author->name",
        'active' => 'home',
        'posts' => $author->posts->load('author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function()
{
    return view('dashboard.index');
})->middleware('auth');

Route::get('/pertanyaan/posts/create', [pertanyaanPostController::class, 'create']);
Route::resource('/pertanyaan/posts', pertanyaanPostController::class)->middleware('auth');


Route::get('/course/posts/create', [CourseController::class, 'create']);
Route::resource('/course/posts', CourseController::class)->middleware('auth');

Route::get('/bulletin/posts/create', [BulletinController::class, 'create']);
Route::resource('/bulletin/posts', BulletinController::class)->middleware('auth');