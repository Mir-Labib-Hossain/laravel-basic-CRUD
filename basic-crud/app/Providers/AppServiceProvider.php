<?php

namespace App\Providers;

use App\EmployeeRepository\employeeImplementation;
use App\EmployeeRepository\employeeInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(employeeInterface::class, employeeImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
