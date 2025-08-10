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

        // Ensure target directory exists
        if (!File::exists($target)) {
            File::makeDirectory($target, 0755, true);
            $this->info('Created target directory.');
        }

        // Create the symbolic link
        try {
            if (windows_os()) {
                // Use symlink function for Windows
                $result = symlink($target, $link);
            } else {
                // Use Laravel's File facade for Unix-like systems
                $result = File::link($target, $link);
            }

            if ($result) {
                $this->info('Storage link created successfully.');
                return 0;
            } else {
                $this->error('Failed to create storage link.');
                return 1;
            }
        } catch (\Exception $e) {
            $this->error('Exception: ' . $e->getMessage());
            return 1;
        }
    }
}
