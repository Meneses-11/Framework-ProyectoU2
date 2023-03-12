<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\entradaController;

/*Route::get('/', function () {
    //return view('/plantillas/menuCliente');
    //return view('welcome');
    return view('/cliente/clntEvent');
});

public function verPantallainicio(){
        return view('cliente.anPinicio');
    }
    */

Route::get('/gerente/usuarios',function(){
    return view('/gerente/inicio');
})->name('listaUsuarios');

Route::get('/',function(){
    return view('/entrada');
})->name('login');
Route::post('/validar',[entradaController::class,'validar'])->name('validar');
Route::get('/error',[entradaController::class,'error'])->name('error');


Route::get('verPaquetes', [clienteController::class, 'verPaquetes'])->name('paquetes');
Route::get('verEventos', [clienteController::class, 'verEventos'])->name('eventos');
Route::get('verInformacion', [clienteController::class, 'verInformacion'])->name('informacion');
