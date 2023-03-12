<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\entradaController;
use App\Http\Controllers\gerenteController;


/*Route::get('/', function () {
    //return view('/plantillas/menuCliente');
    //return view('welcome');
    return view('/cliente/clntEvent');
});*/


Route::get('/',function(){
    return view('/entrada');
})->name('login');

Route::post('/validar',[entradaController::class,'validar'])->name('validar');
Route::get('/error',[entradaController::class,'error'])->name('error');
Route::get('/gerente/paquetes',[gerenteController::class,'paquetes'])->name('listaPaquetes');
Route::get('/gerente/servicios',[gerenteController::class,'servicios'])->name('listaServicios');
Route::get('/gerente/usuarios',[gerenteController::class,'usuarios'])->name('listaUsuarios');



Route::get('verPaquetes', [clienteController::class, 'verPaquetes'])->name('paquetes');
Route::get('verEventos', [clienteController::class, 'verEventos'])->name('eventos');
Route::get('verInformacion', [clienteController::class, 'verInformacion'])->name('informacion');

