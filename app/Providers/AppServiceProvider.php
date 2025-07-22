<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <-- Import
use App\Http\View\Composers\CartComposer; // <-- Import

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
        // Bagikan data ke semua view yang menggunakan layout navigasi
        View::composer('layouts.partials.navigation', CartComposer::class);
    }
}
