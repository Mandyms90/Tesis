<?php

use Illuminate\Support\Facades\Route;

// agregamos los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\CarrucelController;

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
    return view('welcome');
});
Route::get('/info', function () {
    return view('info');
});
Route::get('/contactos', function () {
    return view('contactos');
});
Route::get('/config', function () {
    return view('config');
});


    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('informes',App\Http\Controllers\InformeController::class)->middleware('auth');
Route::resource('informes',App\Http\Controllers\InformeController::class);
Route::resource('carrucels',App\Http\Controllers\CarrucelController::class)->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('blogs',BlogController::class);
    // Route::resource('carrucels',CarrucelController::class);
});