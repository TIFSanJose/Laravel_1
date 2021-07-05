<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Mail\ContactanosMailable;
use App\Models\Curso;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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

Route::get('/', HomeController::class)->name('home');
// //   Metodo - url       controlador  -   Metodo Controlador - nombre Url
// Route::get('curso', [CursoController::class, 'index'])->name('curso.index');

// Route::get('curso/crear', [CursoController::class, 'createCurso'])->name('curso.crear');

// Route::post('curso', [CursoController::class, 'store'])->name('curso.store');

// Route::put('curso/{curso}', [CursoController::class, 'update'])->name('curso.update');

// Route::get('curso/{curso}', [CursoController::class, 'show'])->name('curso.show');

// Route::get('curso/{curso}/edit', [CursoController::class, 'edit'])->name('curso.edit');

// Route::delete('curso/{curso}', [CursoController::class, 'destroy'])->name('curso.destroy');


// cambiar de url sin cambiar el nombre de rutas
Route::resource('asignatura', CursoController::class)->parameters(['asignatura' => 'curso'])->names('curso');

Route::view('nosotros', 'nosotros')->name('nosotros');

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');


// Route::get('curso/{lenguaje}/{so?}', function($lenguaje, $so = null) {
//     if($so){
//         return "bienvenido al curso de $lenguaje en so $so";
//     }else{
//         return "bienvenido al curso de $lenguaje";
//     }
// });

Route::get('/welcome', function() {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('prueba', function() {
    return view('welcome');
})->middleware(['veredad', 'auth']);


Route::get('no-autorizado', function() {
    return auth()->user()->email;
});
