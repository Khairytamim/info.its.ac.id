<?php

namespace App\Providers;

use App\Menus;
use View;
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
        View::composer('layouts.layout', function($view)
        {
            $view->with('menus', Menus::get()->sortBy('created_at'));
            // dd($view);
        });
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
