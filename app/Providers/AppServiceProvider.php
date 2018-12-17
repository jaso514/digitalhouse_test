<?php

namespace App\Providers;

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
        $this->publishes([
            __DIR__ . '/../../vendor/components/font-awesome/css' => public_path('css'),
            __DIR__ . '/../../vendor/components/font-awesome/webfonts' => public_path('webfonts'),
            __DIR__ . '/../../vendor/components/jquery/jquery.min.js' => public_path('js/jquery.min.js'),
            __DIR__ . '/../../vendor/components/jqueryui/jquery-ui.min.js' => public_path('js/jquery-ui.min.js')
        ], 'public');
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
