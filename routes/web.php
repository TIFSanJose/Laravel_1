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
    // return view('welcome');
    return "video 2 del curso laravel";
});

Route::get('curso', function() {
    return "video 2 del curso laravel";
});

// Route::get('curso/{lengauaje}', function($lenguaje) {
//     return "bienvenido al curso de $lenguaje";
// });

// Route::get('curso/{lenguaje}/{so}', function($lenguaje, $so) {
//     return "bienvenido al curso de $lenguaje en so $so";
// });

Route::get('curso/{lenguaje}/{so?}', function($lenguaje, $so = null) {
    if($so){
        return "bienvenido al curso de $lenguaje en so $so";
    }else{
        return "bienvenido al curso de $lenguaje";
    }
});
