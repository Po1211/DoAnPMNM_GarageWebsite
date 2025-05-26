<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

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
        // Register the 'admin' middleware alias
        Route::aliasMiddleware('admin', AdminMiddleware::class);

        // Load web routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
