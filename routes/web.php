<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Failed_jobController;

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


Route::get('/', [HomeController::class, 'Index'])->name('home');
Route::get('/register', [HomeController::class, 'Register'])->name('register');
Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard');
Route::get('/salir', [HomeController::class, 'Salir'])->name('salir');
Route::get('/showfile/{id}', [FileController::class, 'showfile'])->name('showfile');

Route::get('/editafile/{id}', [FileController::class, 'editfile'])->name('editafile');


Route::get('/profiledat/{id}', [FileController::class, 'profiledat'])->name('profiledat');

Route::get('/sharefile/{id}', [FileController::class, 'sharefile'])->name('sharefile');
Route::get('/credencialespr/{id}', [UsuarioController::class, 'credencialespr'])->name('credencialespr');
Route::get('/credencialesprhorizontal/{id}', [UsuarioController::class, 'credencialesprhorizontal'])->name('credencialesprhorizontal');

// RUTAS POST
Route::post('/registrar_usuario', [UsuarioController::class, 'Registrar_usuario'])->name('registrar_usuario');

Route::post('/storeshare', [FileController::class, 'storeshare'])->name('storeshare');
Route::get('/shareindex', [FileController::class, 'shareindex'])->name('shareindex');
Route::post('/login', [UsuarioController::class, 'Login'])->name('loginuser');

Route::put('/editar_usuario/{id}', [UsuarioController::class, 'update'])->name('editar_usuario');
Route::put('/updatefiledata/{id}', [FileController::class, 'updatefiledata'])->name('updatefiledata');
Route::delete('/destroyfiledat/{id}', [FileController::class, 'DrestoyFileDat'])->name('destroyfiledat');

Route::delete('/destroyshare/{id}', [FileController::class, 'destroyshare'])->name('destroyshare');
//BUCADOR
Route::post('/buscarfile', [FileController::class, 'buscar'])->name('buscarfile');
Route::post('/buscaruser', [UsuarioController::class, 'buscar'])->name('buscaruser');
Route::post('/buscarinstitution', [Failed_jobController::class, 'buscar'])->name('buscarinstitution');
//BUCADOR
Route::post('/buscarfilerute/{id}', [FileController::class, 'buscarfilerute'])->name('buscarfilerute');
//RUTAS RESOURCE

Route::resource('/usuarios', UsuarioController::class);
Route::resource('/file', FileController::class);
Route::resource('/failed_job', Failed_jobController::class);



Route::get('descargar-archivo/{archivo}', function ($archivo) {
    $rutaArchivo = storage_path('app/public/' . $archivo);
    return response()->download($rutaArchivo);
})->name('descargar-archivo');



/***************************ENVIAR CORREOS ****************/

Route::post('/enviarcorreo', [ UsuarioController::class, 'enviarcorreo'])->name('enviarcorreo');
Route::get('/enviarcorreodestino/{id}', [ UsuarioController::class, 'enviarcorreodestino'])->name('enviarcorreodestino');
