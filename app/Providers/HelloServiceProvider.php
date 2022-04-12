<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 3-35.クロージャでコンポーザを利用する
        View::composer(
            'hello.index', function($view) {
                $view->with('view_message', 'composer message!');
            }
        );
    }
}
