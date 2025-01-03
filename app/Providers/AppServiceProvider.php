<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define a generic permission Gate
        Gate::define('permission', function ($user, $permissionName) {
            return $user->permissions()->pluck('name')->contains($permissionName);
        });
    }
}
