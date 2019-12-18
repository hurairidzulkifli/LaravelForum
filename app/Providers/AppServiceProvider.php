<?php

namespace LaravelForum\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; //use View Facade to share data rather than declaring everytime in controller
use LaravelForum\Channel;  //import class

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
        View::share('channels',Channel::all());
        
    }
}
