<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\LoanController;
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

Route::view('/', 'index')->name('index');

Route::view('/create', 'users.createUser')->name('crearCuenta');
// Para hacer referencia a la ruta se utiliza su Name
Route::post('/signUp', [LoginController::class, 'register'])->name('user.store');

Route::view('/login', 'users.logInUser')->name('login');
Route::post('/iniciaSesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');


// Rutas que requieren verificación de credenciales llevan el middleware 'auth'.
// Rutas solo accesibles por el usuario llevan el middleware 'onlyUser'.
// Rutas solo accesibles por el administrador llevan el middleware 'admin'.

/*
Para bloquear una entrada no autorizada a una ruta se utiliza el middleware auth. Puntos a tener en cuenta:
- Se verifica el acceso con Auth::attempt($credenciales). Por defecto estas credenciales son email y password. 
    La password *NO* se pasa hasheada.

- La tabla de usuarios debe llamarse users y su identificador debe ser 'id'.
- Para evitar conflictos se regenera la sesion después de autenticar.
*/

Route::view('/panel', 'mainUser')->middleware(['auth','onlyUser'])->name('mipanel');


Route::post('/panel/envioMensaje',[MessageController::class,'sendMessage'])->middleware(['auth','onlyUser'])->name('sendMessage');

Route::view('/panel/ingresar','users.ingresar')->middleware(['auth','onlyUser'])->name('ingresar');
Route::post('/panel/postIngresar',[MovementController::class,'deposit'])->middleware(['auth','onlyUser','checkRequestMethod:POST'])->name('postIngresar');


Route::view('/panel/retirar','users.retirar')->middleware(['auth','onlyUser'])->name('retirar');
Route::post('/panel/postRetirar',[MovementController::class,'substract'])->middleware(['auth','onlyUser','checkRequestMethod:POST'])->name('postRetirar');

Route::view('/panel/enviar','users.enviar')->middleware(['auth','onlyUser'])->name('enviar');
Route::post('/panel/postEnviar',[MovementController::class,'send'])->middleware(['auth','onlyUser','checkRequestMethod:POST'])->name('postEnviar');


Route::view('/panel/solicitar', 'users.solicitudPrestamoUser')->middleware(['auth','onlyUser'])->name('solicitar');
Route::post('/panel/postSolicitar',[LoanController::class,'requestLoan'])->middleware(['auth','onlyUser','checkRequestMethod:POST'])->name('postSolicitar');

Route::get('/panel/verMisPrestamos', [LoanController::class,'showLoan'])->middleware(['auth','onlyUser'])->name('verPrestamos');

Route::get('/panel/verMisMovimientos', [MovementController::class,'showMovements'])->middleware(['auth','onlyUser'])->name('verMovimientos');

Route::view('/panel/misDatos', 'users.editarDatos')->middleware(['auth','onlyUser'])->name('datosUsuario');
Route::post('/panel/misDatos/actualizardatos', [UserController::class,'changeData'])->middleware(['auth','onlyUser'])->name('actualizarDatos');
Route::post('/panel/misDatos/actualizarpassword', [UserController::class,'changePassword'])->middleware(['auth','onlyUser'])->name('actualizarPassword');
Route::post('/panel/misDatos/cambiarFotoPerfil', [UserController::class,'changeProfilePhoto'])->middleware(['auth','onlyUser'])->name('cambiarFotoPerfil');





Route::get('/adminPanel',[AdminController::class,'mainAdmin'])->middleware(['auth','admin'])->name('panelAdmin');
Route::get('/adminPanel/movimientos',[MovementController::class,'adminMovements'])->middleware(['auth','admin'])->name('movimientosBanco');
Route::get('/adminPanel/cuentas',[AccountController::class,'adminAccounts'])->middleware(['auth','admin'])->name('cuentasBanco');
Route::get('/adminPanel/usuarios',[UserController::class,'adminUsers'])->middleware(['auth','admin'])->name('usuariosBanco');
Route::get('/adminPanel/prestamos',[LoanController::class,'adminLoans'])->middleware(['auth','admin'])->name('prestamosBanco');
Route::view('/adminPanel/buscarUser','adminFindUser')->middleware(['auth','admin'])->name('buscarUser');
Route::post('/adminPanel/usuarioPorNif',[UserController::class,'userByNif'])->middleware(['auth','admin','checkRequestMethod:POST'])->name('usuarioPorNif');
Route::post('/adminPanel/usuarioPorNif/usuarioBan',[UserController::class,'banUser'])->middleware(['auth','admin','checkRequestMethod:POST'])->name('usuarioBan');
Route::any('/adminPanel/chat',[AdminController::class,'getChatMessages'])->middleware(['auth','admin'])->name('adminChat');
Route::post('/adminPanel/chat/envioAdmin',[MessageController::class,'adminSendMessage'])->middleware(['auth','admin','checkRequestMethod:POST'])->name('adminSendMessage');
Route::post('/adminPanel/aprobarprestamos',[LoanController::class,'approveLoan'])->middleware(['auth','admin','checkRequestMethod:POST'])->name('approveLoans');

