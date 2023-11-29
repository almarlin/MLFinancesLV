<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

// Llama al método _invoke del controlador
// _invoke para una sola ruta. Para más rutas se utiliza varias funciones con nombres distintos. Por convención el prinicpal se llama index.

Route::view('/', 'index');

Route::view('/signUp', 'users.createUser')->name('crearCuenta');
// Para hacer referencia a la ruta se utiliza su Name
Route::post('/signUp', [LoginController::class, 'register'])->name('user.store');

Route::view('/login', 'users.loginUser')->name('login');
Route::post('/login', [LoginController::class, 'login']);


// Rutas que requieren verificación de credenciales

Route::get('/panel', [HomeController::class, 'panel'])->middleware('auth')->name('mipanel');
Route::get('/adminPanel', [HomeController::class, 'adminPanel'])->middleware('auth')->name('panelAdmin');

