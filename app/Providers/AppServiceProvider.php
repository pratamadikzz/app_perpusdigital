<?php

namespace App\Providers;

use App\Models\BookRequest;
use Illuminate\Support\Facades\View;
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
        View::composer('admin.*', function($view){
            $pendingCount = BookRequest::where('status', 'pending')->count();

            $view->with('pendingCount', $pendingCount);
        });
    }
}
