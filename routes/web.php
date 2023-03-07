<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;

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
    //return view('/plantillas/menuCliente');
    //return view('welcome');
    return view('/cliente/clntEvent');
});
Route::get('/gerente/usuarios',function(){
    return view('/gerente/inicio');
});


Route::get('verPaquetes', [clienteController::class, 'verPaquetes'])->name('paquetes');
Route::get('verEventos', [clienteController::class, 'verEventos'])->name('eventos');
Route::get('verInformacion', [clienteController::class, 'verInformacion'])->name('informacion');

