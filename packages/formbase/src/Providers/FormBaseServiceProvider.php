<?php

namespace Saodat\FormBase\Providers;

use Illuminate\Support\ServiceProvider;
use Saodat\FormBase\Services\Contracts\FieldManager as FieldManagerContract;
use Saodat\FormBase\Services\FieldManager;

/**
 * Class FormBaseServiceProvider
 * @package Saodat\FormBase\Providers
 */
class FormBaseServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(FieldManagerContract::class, FieldManager::class);
    }
}
