<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\entradaController;
use App\Http\Controllers\gerenteController;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventoController;

/*Route::get('/', function () {
    //return view('/plantillas/menuCliente');
    //return view('welcome');
    return view('/cliente/clntEvent');
});*/


Route::get('/',function(){return redirect(route('inicio')); })->name('inicio');

Route::get('/login',function(){
    return view('entrada');
})->name('login');

Route::post('/validar',[entradaController::class,'validar'])->name('validar');
Route::get('/error',[entradaController::class,'error'])->name('error');
Route::get('/gerente/test',[gerenteController::class,'test'])->name('test');
Route::get('/gerente/servicios',[gerenteController::class,'servicios'])->name('listaServicios');
Route::get('/gerente/usuarios1',[gerenteController::class,'usuarios'])->name('listaUsuarios');

Route::get('/inicio',[entradaController::class,'inicio'])->name('inicio');


Route::get('nuestrosPaquetes', [clienteController::class, 'verPaquetes'])->name('paquetes');
Route::get('misEventos', [clienteController::class, 'verEventos'])->name('eventos');
Route::get('aboutWe', [clienteController::class, 'verInformacion'])->name('informacion');

Route::get('empleado',[empleadoController::class, 'principal'])->name('empleadoPrin');

Route::resource('gerente', UsuariosController::class, [
    'names' => [
        'index' => 'usuarios.index',
        'show' => 'usuario.detalle',
        'create' => 'usuario.create',
        'store' => 'usuarios.store',
        'destroy' => 'usuarios.destroy',
        'edit' => 'usuarios.editar',
        'update' => 'usuarios.actualizar',
    ],
]);

Route::resource('evento', EventoController::class);
