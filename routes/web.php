<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\entradaController;
use App\Http\Controllers\gerenteController;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventoController;


Route::get('/',function(){return redirect(route('inicio')); })->name('inicio');

Route::get('/login',function(){
    return view('plantillas.login');
})->name('login');

Route::get('/dragandrop',function(){
    return view('drop');
})->name('drop');

Route::post('/validar',[entradaController::class,'validar'])->name('validar');
Route::get('cerrar_sesion', [entradaController::class, 'cerrar_sesion'])->name(("cerrar_sesion"));

Route::get('/error',[entradaController::class,'error'])->name('error');
Route::get('/gerente/test',[gerenteController::class,'test'])->name('test');

Route::get('/inicio',[entradaController::class,'inicio'])->name('inicio');


Route::get('paquetes', [clienteController::class, 'verPaquetes'])->name('paquetes');
Route::post('/img', [clienteController::class, 'store'])->name('imgStore');

Route::get('misEventos', [clienteController::class, 'verEventos'])->name('eventos');
Route::get('aboutWe', [clienteController::class, 'verInformacion'])->name('informacion');

Route::get('empleado',[empleadoController::class, 'principal'])->name('empleadoPrin');

Route::resource('usuario', UsuariosController::class, [
    'names' => [
        'index' => 'usuario.inicio',
        'show' => 'usuario.detalle',
        'create' => 'usuario.crear',
        'store' => 'usuario.llenar',
        'destroy' => 'usuario.destruir',
        'edit' => 'usuario.editar',
        'update' => 'usuario.actualizar',
    ],
]);
Route::put('/paquete/{paquete}/activo', [PaqueteController::class, 'activo'])->name('paquete.activo');

Route::resource('paquete', PaqueteController::class, [
    'names' => [
        'index' => 'paquete.index',
        'show' => 'paquete.detalle',
        'create' => 'paquete.create',
        'store' => 'paquete.store',
        'destroy' => 'paquete.destroy',
        'edit' => 'paquete.editar',
        'update' => 'paquete.actualizar',
    ],
]);

Route::resource('servicio', ServicioController::class, [
    'names' => [
        'index' => 'servicio.inicio',
        'show' => 'servicio.detalle',
        'create' => 'servicio.crear',
        'store' => 'servicio.llenar',
        'destroy' => 'servicio.destruir',
        'edit' => 'servicio.editar',
        'update' => 'servicio.actualizar',
    ],
]);

Route::resource('evento', EventoController::class);

Route::put('evento/confirmar/{id}', [EventoController::class, 'confirmar'])->name('evento.confirmar');

//Route::get('descripccion-paquetes', [PaqueteController::class, 'verMas'])->name('verMas');
Route::post('/upload', [clienteController::class, 'upload'])->name('upload');
Route::post('/cambiar_contraseña', [UsuariosController::class, 'cambiarContraseña'])->name('cambiar_contraseña');
Route::get('/recuperar_contraseña',function(){
    return view('plantillas.cambiarContraseña');
})->name('recuperar_contraseña');
Route::get('/registrarse',function(){
    return view('cliente.registrarse');
})->name('registrarse');
Route::post('/registrar_usuario', [UsuariosController::class, 'registrarse'])->name('registrar_usuario');

Route::post('paquete/evento', [EventoController::class, 'crearP'])->name('crearP');
