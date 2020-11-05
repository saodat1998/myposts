<?php

namespace Saodat\FormBase\Providers;

use Illuminate\Support\ServiceProvider;
use Saodat\FormBase\FormBase;
use Saodat\FormBase\FormBaseContract;

class FormBaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(FormBaseContract::class, FormBase::class);
    }
}
