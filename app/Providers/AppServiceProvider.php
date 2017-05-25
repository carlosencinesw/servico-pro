<?php

namespace App\Providers;

use App\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pagina = explode('/', $_SERVER['PHP_SELF']);
        $rota = Request::is('app/dashboard');
        View::share('pagina', $pagina);
        View::share('rota', $rota);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
