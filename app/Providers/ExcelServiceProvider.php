<?php

namespace App\Providers;

use App\Services\ExcelService;
use Illuminate\Support\ServiceProvider;

class ExcelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('excel_ops',function(){
            return new ExcelService;
        });
    }
}
