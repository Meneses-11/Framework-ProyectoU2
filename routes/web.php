<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\entradaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;

Route::get('/',function(){return redirect(route('inicio')); })->name('inicio');

Route::get('/login',function(){
    return view('plantillas.login');
})->name('login');

Route::get('/test1',function(){
    return view('gerente.test1');
})->name('test1');



Route::get('/error',function(){
    return view('plantillas.errorVista');
})->name('d');

Route::post('/validar',[entradaController::class,'validar'])->name('validar');
Route::get('cerrar_sesion', [entradaController::class, 'cerrar_sesion'])->name(("cerrar_sesion"));


Route::get('/inicio',[entradaController::class,'inicio'])->name('inicio');

Route::get('paquetes', [clienteController::class, 'verPaquetes'])->name('paquetes')->middleware('auth');
Route::post('gasto/create', [EventoController::class, 'gasto'])->name('gasto.create')->middleware('auth');
Route::get('misEventos', [clienteController::class, 'verEventos'])->name('eventos')->middleware('auth');
Route::get('/evento/{evento}/galeria', [EventoController::class, 'galeria'])->name('evento.galeria')->middleware('auth');


Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::put('/evento/imagenes/{id}', [EventoController::class, 'imagenes'])->name('evento.imagenes')->middleware('auth');
Route::get('/imagenes/{evento}', [EventoController::class, 'crudimg'])->name('evento.images')->middleware('auth');
Route::put('/imagenes/edit/{imagen}', [EventoController::class, 'editDescripcion'])->name('evento.editDescripcion')->middleware('auth');

Route::resource('imagen',ImagenController::class)->middleware('auth');

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
])->middleware('auth');
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
])->middleware('auth');

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
])->middleware('auth');

Route::resource('evento', EventoController::class)->middleware('auth');

Route::put('evento/confirmar/{id}', [EventoController::class, 'confirmar'])->name('evento.confirmar')->middleware('auth');
Route::put('evento/denegar/{id}', [EventoController::class, 'denegar'])->name('evento.denegar')->middleware('auth');;
Route::get('/eventos',[EventoController::class, 'mostrar'])->name('evento.mostrar')->middleware('auth');

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

//Route::post('paquete/evento', [EventoController::class, 'crearP'])->name('paquete.crear.evento')->middleware('auth');
Route::get('paquete/evento/{paquete}', [EventoController::class, 'crearP'])->name('paquete.crear.evento')->middleware('auth');

Route::get('/check-email-availability', [UsuariosController::class, 'checkEmailAvailability'])->name('check-email-availability');

