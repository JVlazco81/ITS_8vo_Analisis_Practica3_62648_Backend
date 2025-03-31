<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(
            \App\Domain\Auth\Repositories\UserRepositoryInterface::class,
            \App\Infrastructure\Persistence\Repositories\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Application\Auth\Interfaces\HasherInterface::class,
            \App\Infrastructure\Services\LaravelHasher::class
        );

        $this->app->bind(
            \App\Application\Auth\Interfaces\JWTServiceInterface::class,
            \App\Infrastructure\Services\LaravelJWTService::class
        );
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
