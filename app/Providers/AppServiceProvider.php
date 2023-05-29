<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Console\Migrations\InstallCommand;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->extend('migration.repository', function($repository, Application $app) {
            $table = $app['config']['database.migrations'];
            return new \DanielHe4rt\Scylloquent\Repository\DatabaseMigrationRepository($app['db'], $table);
        });

        Sanctum::ignoreMigrations();
        $this->app->bind(MigrationRepositoryInterface::class, function ($app) {
            return new InstallCommand($app['migration.repository']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $this->app->singleton(DatabaseMigrationRepository::class, function (Application $app) {
            $table = config('database.migrations');
            return new \DanielHe4rt\Scylloquent\Repository\DatabaseMigrationRepository($app['db'], $table);
        });
    }
}
