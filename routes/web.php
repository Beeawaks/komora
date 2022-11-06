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

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/course', function () {
    return view('course');
});

Route::get('/bulletin', function () {
    return view('bulletin');
});
