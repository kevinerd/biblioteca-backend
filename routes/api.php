<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::resource('autores', \App\Http\Controllers\AutorController::class);
Route::resource('libros', \App\Http\Controllers\LibroController::class);
Route::resource('generos', \App\Http\Controllers\GeneroController::class);
Route::resource('eventos', \App\Http\Controllers\EventoController::class);
Route::resource('talleres', \App\Http\Controllers\TallerController::class);

Route::get('libro_semanal', 'LibroController@libroSemanal');
Route::get('libros_destacados', 'LibroController@librosDestacados');