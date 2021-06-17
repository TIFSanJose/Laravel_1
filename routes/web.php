<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Models\Curso;
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

Route::get('/', HomeController::class);
//   Metodo - url       controlador  -   Metodo Controlador - nombre Url
Route::get('curso', [CursoController::class, 'index'])->name('curso.index');

Route::get('curso/crear', [CursoController::class, 'createCurso'])->name('curso.crear');

Route::post('curso', [CursoController::class, 'store'])->name('curso.store');

Route::get('curso/{id}', [CursoController::class, 'show'])->name('curso.show');

// Route::get('curso/{lenguaje}/{so?}', function($lenguaje, $so = null) {
//     if($so){
//         return "bienvenido al curso de $lenguaje en so $so";
//     }else{
//         return "bienvenido al curso de $lenguaje";
//     }
// });
