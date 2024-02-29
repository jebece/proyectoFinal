<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/receta', [RecetaController::class, 'index'])->middleware('auth');
Route::post('/receta', [RecetaController::class, 'store'])->middleware('auth');
Route::get('/receta/create', [RecetaController::class, 'create'])->middleware('auth');
Route::get('/receta/{receta}', [RecetaController::class, 'show'])->middleware('auth');
Route::put('/receta/{receta}', [RecetaController::class, 'update'])->middleware('auth');
Route::delete('/receta/{receta}', [RecetaController::class, 'destroy'])->middleware('auth');
Route::get('/receta/{receta}/edit', [RecetaController::class, 'edit'])->middleware('auth');
Route::get('/receta/{receta}/show', [RecetaController::class, 'show'])->middleware('auth');


Auth::routes(['reset' => false]);

Route::get('/', [RecetaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [RecetaController::class, 'index'])->name('home');
} );


