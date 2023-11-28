<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/signUp', [UserController::class, 'create']);
// Para hacer referencia a la ruta se utiliza su Name
Route::post('/signUp', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [UserController::class, 'logUser']);
Route::post('/login', [UserController::class, 'login'])->name('login');


// Rutas que requieren verificación de credenciales
Route::middleware(['auth'])->group(function() {
    Route::get('/panel', [HomeController::class, 'panel']);
    Route::get('/adminPanel', [HomeController::class, 'adminPanel']);
});
