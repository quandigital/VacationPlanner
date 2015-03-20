<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * Binding of the Interfaces to the Eloquentclasses
     * @return void
     *
     */

    public function register()
    {
        $this->app->bind('App\Storages\Holiday\HolidayRepository',
                         'App\Storages\Holiday\EloquentHolidayRepository');
        $this->app->bind('App\Storages\User\UserRepository',
                         'App\Storages\User\EloquentUserRepository');
        $this->app->bind('App\Storages\Supervisor\SupervisorRepository',
                         'App\Storages\Supervisor\EloquentSupervisorRepository');
    }

}