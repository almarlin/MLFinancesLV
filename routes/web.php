<?php

use Illuminate\Support\Facades\Route;
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

Route::view('/', 'index')->name('index');

Route::view('/create', 'users.createUser')->name('crearCuenta');
// Para hacer referencia a la ruta se utiliza su Name
Route::post('/signUp', [LoginController::class, 'register'])->name('user.store');

Route::view('/login', 'users.loginUser')->name('login');
Route::post('/iniciaSesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');


// Rutas que requieren verificación de credenciales llevan el middleware 'auth'

/*
Para bloquear una entrada no autorizada a una ruta se utiliza el middleware auth. Puntos a tener en cuenta:
- Se verifica el acceso con Auth::attempt($credenciales). Por defecto estas credenciales son email y password. 
    La password *NO* se pasa hasheada.

- La tabla de usuarios debe llamarse users y su identificador debe ser 'id'.
- Para evitar conflictos se regenera la sesion después de autenticar.
*/

Route::view('/panel', 'mainUser')->middleware('auth')->name('mipanel');
Route::view('/adminPanel', 'mainAdmin')->middleware('auth')->name('panelAdmin');

