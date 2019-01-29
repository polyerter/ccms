<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     * todo создан провайдер для передачи параметров настройки во все вьюхи
     * @return void
     */
    public function boot()
    {
//        view()->share('sitename', Setting::where('sitename')->first()->get());
//        view()->share('sitedescription', Setting::where('key','sitedescription')->first()->value );
//        view()->share('sitekeywords', Setting::where('key','sitekeywords')->first()->value );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
