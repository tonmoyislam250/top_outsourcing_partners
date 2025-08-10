<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(env('APP_ENV') == 'production') {
            URL::forceScheme('https');
            
            // Create storage link if it doesn't exist (for Railway deployment)
            if (!file_exists(public_path('storage'))) {
                $this->app->make('files')->link(
                    storage_path('app/public'),
                    public_path('storage')
                );
            }
        }
    }
}
