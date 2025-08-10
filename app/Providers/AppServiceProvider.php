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
            $this->ensureStorageLink();
        }
    }

    /**
     * Ensure storage link exists for production deployment
     */
    private function ensureStorageLink(): void
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        // If storage link doesn't exist, try to create it
        if (!file_exists($link)) {
            try {
                // Method 1: Try symlink
                if (@symlink($target, $link)) {
                    return;
                }
                
                // Method 2: Try Laravel's link method
                if ($this->app->make('files')->link($target, $link)) {
                    return;
                }
                
                // Method 3: Copy directory as fallback
                if (is_dir($target)) {
                    $this->app->make('files')->copyDirectory($target, $link);
                }
            } catch (\Exception $e) {
                // Log the error but don't break the app
                \Log::warning('Failed to create storage link: ' . $e->getMessage());
            }
        }
    }
}
