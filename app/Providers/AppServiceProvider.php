<?php

namespace App\Providers;

use App\Repositories\Message\MessageRepository;
use App\Repositories\Message\MessageScyllaRepository;
use App\Repositories\Streamer\StreamerRepository;
use App\Repositories\Streamer\StreamerScyllaRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Console\Migrations\InstallCommand;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Illuminate\Pagination\Paginator;
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

//        $this->app->extend('migration.repository', function($repository, Application $app) {
//            $table = $app['config']['database.migrations'];
//            return new \DanielHe4rt\Scylloquent\Repository\DatabaseMigrationRepository($app['db'], $table);
//        });

        $this->app->bind(MessageRepository::class, MessageScyllaRepository::class);
        $this->app->bind(StreamerRepository::class, StreamerScyllaRepository::class);

        Sanctum::ignoreMigrations();
//        $this->app->bind(MigrationRepositoryInterface::class, function ($app) {
//            return new InstallCommand($app['migration.repository']);
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
//        $this->app->singleton(DatabaseMigrationRepository::class, function (Application $app) {
//            $table = config('database.migrations');
//            return new \DanielHe4rt\Scylloquent\Repository\DatabaseMigrationRepository($app['db'], $table);
//        });
    }
}
