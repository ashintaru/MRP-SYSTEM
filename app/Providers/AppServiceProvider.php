<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {

        // Builder::macro('search',function($field,$string){
        //     return $string ? $this->where($field,'like','%'.$string.'%') : $this;
        // });
        //
        // date_default_timezone_set('Asia/PHT');
    }
}
