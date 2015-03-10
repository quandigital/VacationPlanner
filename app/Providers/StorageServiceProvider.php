<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     *
     * Binding of the Interfaces to the Eloquentclasses
     */

    public function register()
    {
        $this->app->bind('App\Storages\Day\DayRepository', 'App\Storages\Day\EloquentDayRepository');
        $this->app->bind('App\Storages\User\UserRepository', 'App\Storages\User\UserRepository');
    }

}