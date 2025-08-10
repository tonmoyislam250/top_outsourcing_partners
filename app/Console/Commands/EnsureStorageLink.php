<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class EnsureStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:link-force';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create storage symbolic link with force option for Railway deployment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $target = storage_path('app/public');
        $link = public_path('storage');

        // Ensure target directory exists
        if (!File::exists($target)) {
            File::makeDirectory($target, 0755, true);
            $this->info('Created target directory: ' . $target);
        }

        // Remove existing link/directory if it exists
        if (File::exists($link)) {
            if (is_link($link)) {
                unlink($link);
                $this->info('Removed existing symbolic link.');
            } else {
                File::deleteDirectory($link);
                $this->info('Removed existing directory.');
            }
        }

        // Try different methods to create the symbolic link
        try {
            // Method 1: Try using Laravel's File facade
            if (File::link($target, $link)) {
                $this->info('Storage link created successfully using Laravel File facade.');
                return 0;
            }
        } catch (\Exception $e) {
            $this->warn('Laravel File facade failed: ' . $e->getMessage());
        }

        try {
            // Method 2: Try using PHP's symlink function
            if (symlink($target, $link)) {
                $this->info('Storage link created successfully using PHP symlink.');
                return 0;
            }
        } catch (\Exception $e) {
            $this->warn('PHP symlink failed: ' . $e->getMessage());
        }

        try {
            // Method 3: For Railway/production environments, copy files instead of symlink
            if (app()->environment('production')) {
                $this->info('Creating storage directory copy for production environment...');
                File::copyDirectory($target, $link);
                $this->info('Storage directory copied successfully.');
                return 0;
            }
        } catch (\Exception $e) {
            $this->warn('Directory copy failed: ' . $e->getMessage());
        }

        $this->error('All methods failed to create storage link.');
        return 1;
    }
}
