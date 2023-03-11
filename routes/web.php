<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\entradaController;

/*Route::get('/', function () {
    //return view('/plantillas/menuCliente');
    //return view('welcome');
    return view('/cliente/clntEvent');
});*/

Route::get('/gerente/usuarios',function(){
    return view('/gerente/inicio');
})->name('listaUsuarios');

Route::get('/',function(){
    return view('/entrada');
})->name('login');
Route::post('/validar',[entradaController::class,'validar'])->name('validar');
Route::get('/error',[entradaController::class,'error'])->name('error');


Route::get('nuestrosPaquetes', [clienteController::class, 'verPaquetes'])->name('paquetes');
Route::get('misEventos', [clienteController::class, 'verEventos'])->name('eventos');
Route::get('aboutWe', [clienteController::class, 'verInformacion'])->name('informacion');

