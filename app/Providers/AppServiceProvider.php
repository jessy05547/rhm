<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\utilisateur;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            \Illuminate\Support\Facades\Schema::defaultStringLength(191);
            View::composer('*', function ($view) {
        if (session('utilisateur_id')) {
            $profil = utilisateur::find(session('utilisateur_id'));
                 $view->with('profil', $profil);
        }
        });
    }
}
