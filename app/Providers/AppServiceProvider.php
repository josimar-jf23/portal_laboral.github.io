<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        if(env('APP_ENV')!=='local'){
            URL::forceScheme('https');
        }
        /*
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
        */
        //
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(['header' => 'MAIN NAVIGATION']);
            $event->menu->add([
                'text'      => 'Usuarios',
                'icon'      => 'fas fa-fw fa-users',
                'route'     => 'admin.usuarios.index',
            ]);
            $event->menu->add([
                'text'      => 'Empresas',
                'icon'      => 'fa fa-fw fa-building',
                'route'     => 'admin.empresas.index',
            ]);
            $event->menu->add([
                'text'        => 'Rubros',
                'icon'        => 'fa fa-fw fa-users',
                'route'       => 'admin.rubros.index',
            ]);
            $event->menu->add([
                'text'        => 'Contactos',
                'route'       => 'admin.contactos.index',
                'icon'        => 'far fa-fw fa-address-card',
            ]);
            $event->menu->add([
                'text'        => 'Areas',
                'icon'        => 'fa fa-fw fa-cogs',
                'route'       => 'admin.areas.index',                
            ]);
            $event->menu->add([
                'text'      => 'Puestos Trabajo',
                'route'     => 'admin.puestos.index',
                'icon'      => 'fa fa-fw fa-briefcase',
            ]);
            $event->menu->add([
                'text'        => 'Suscriptores',
                'route'     => 'admin.suscriptores.index',
                'icon'        => 'fa fa-fw fa-handshake',
            ]);
            $event->menu->add([
                'text'        => 'Publicaciones',
                'route'       => 'admin.publicaciones.index',
                'icon'        => 'fa fa-fw fa-newspaper',
            ]);
            $event->menu->add([
                'text'    => 'Utilitarios',
                'icon'    => 'fa fa-fw fa-wrench',
                'submenu' => [
                    [
                        'text' => 'Paises',
                        'icon' => 'fas fa-fw fa-globe',
                        'icon_color' => 'red',
                        'route'     => 'admin.paises.index',
                    ],
                    [
                        'text' => 'Departamentos',
                        'icon' => 'fas fa-fw fa-globe',
                        'icon_color' => 'blue',
                        'route'     => 'admin.departamentos.index',
                    ],
                    [
                        'text' => 'Ciudades',
                        'icon' => 'fas fa-fw fa-globe',
                        'icon_color' => 'cyan',
                        'route'     => 'admin.ciudades.index',
                    ],
                ],
            ]);
            $event->menu->add(['header' => 'REPORTES']);
            $event->menu->add([
                'text'       => 'Reporte1',
                'icon_color' => 'red',
                'url'        => '#',
            ]);
        });
    }
}
