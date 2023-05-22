<?php

namespace App\Providers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Observers\ObserverEvento;
use App\Observers\ObserverPaquete;
use App\Observers\ObserverServicio;
use App\Observers\ObserverUsuario;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Usuario::observe(ObserverUsuario::class);
        Paquete::observe(ObserverPaquete::class);
        Servicio::observe(ObserverServicio::class);
        Evento::observe(ObserverEvento::class);
        
    }
}
