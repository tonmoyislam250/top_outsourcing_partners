<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\TeamMember;
use App\Services\CloudinaryService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class MigrateImagesToCloudinary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:migrate-to-cloudinary {--dry-run : Run without making changes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing images from local storage to Cloudinary';

    protected $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        parent::__construct();
        $this->cloudinaryService = $cloudinaryService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');
        
        if ($dryRun) {
            $this->info('Running in dry-run mode. No changes will be made.');
        }

        $this->info('Starting image migration to Cloudinary...');

        // Migrate blog images
        $this->migrateBlogImages($dryRun);

        // Migrate team member images
        $this->migrateTeamMemberImages($dryRun);

        $this->info('Image migration completed!');
    }

    protected function migrateBlogImages($dryRun = false)
    {
        $this->info('Migrating blog images...');
        
        $blogs = Blog::whereNotNull('image')->whereNull('image_public_id')->get();
        
        if ($blogs->isEmpty()) {
            $this->info('No blog images to migrate.');
            return;
        }

        $bar = $this->output->createProgressBar($blogs->count());
        $bar->start();

        foreach ($blogs as $blog) {
            $imagePath = public_path('storage/' . $blog->image);
            
            if (!File::exists($imagePath)) {
                $this->warn("Image not found for blog '{$blog->title}': {$imagePath}");
                $bar->advance();
                continue;
            }

            if (!$dryRun) {
                try {
                    // Create a temporary uploaded file instance
                    $tempFile = $this->createTempUploadedFile($imagePath);
                    
                    $uploadResult = $this->cloudinaryService->uploadBlogImage(
                        $tempFile,
                        $blog->title,
                        $blog->type
                    );

                    if ($uploadResult['success']) {
                        $blog->update([
                            'image' => $uploadResult['url'],
                            'image_public_id' => $uploadResult['public_id']
                        ]);
                    } else {
                        $this->error("Failed to upload image for blog '{$blog->title}': " . $uploadResult['error']);
                    }

                    // Clean up temp file
                    unlink($tempFile->getRealPath());
                } catch (\Exception $e) {
                    $this->error("Error migrating image for blog '{$blog->title}': " . $e->getMessage());
                }
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Blog image migration completed.');
    }

    protected function migrateTeamMemberImages($dryRun = false)
    {
        $this->info('Migrating team member images...');
        
        $teamMembers = TeamMember::where(function($query) {
            $query->whereNotNull('image')->whereNull('image_public_id')
                  ->orWhere(function($q) {
                      $q->whereNotNull('modal_image')->whereNull('modal_image_public_id');
                  });
        })->get();
        
        if ($teamMembers->isEmpty()) {
            $this->info('No team member images to migrate.');
            return;
        }

        $bar = $this->output->createProgressBar($teamMembers->count());
        $bar->start();

        foreach ($teamMembers as $member) {
            $updated = false;

            // Migrate main image
            if ($member->image && !$member->image_public_id) {
                $imagePath = public_path($member->image);
                
                if (File::exists($imagePath)) {
                    if (!$dryRun) {
                        try {
                            $tempFile = $this->createTempUploadedFile($imagePath);
                            
                            $uploadResult = $this->cloudinaryService->uploadTeamMemberImage(
                                $tempFile,
                                $member->name,
                                'main'
                            );

                            if ($uploadResult['success']) {
                                $member->image = $uploadResult['url'];
                                $member->image_public_id = $uploadResult['public_id'];
                                $updated = true;
                            }

                            unlink($tempFile->getRealPath());
                        } catch (\Exception $e) {
                            $this->error("Error migrating main image for '{$member->name}': " . $e->getMessage());
                        }
                    }
                }
            }

            // Migrate modal image
            if ($member->modal_image && !$member->modal_image_public_id && $member->modal_image !== $member->image) {
                $modalImagePath = public_path($member->modal_image);
                
                if (File::exists($modalImagePath)) {
                    if (!$dryRun) {
                        try {
                            $tempFile = $this->createTempUploadedFile($modalImagePath);
                            
                            $uploadResult = $this->cloudinaryService->uploadTeamMemberImage(
                                $tempFile,
                                $member->name,
                                'modal'
                            );

                            if ($uploadResult['success']) {
                                $member->modal_image = $uploadResult['url'];
                                $member->modal_image_public_id = $uploadResult['public_id'];
                                $updated = true;
                            }

                            unlink($tempFile->getRealPath());
                        } catch (\Exception $e) {
                            $this->error("Error migrating modal image for '{$member->name}': " . $e->getMessage());
                        }
                    }
                } else {
                    // If modal image is same as main image, copy the public_id
                    if (!$dryRun && $member->modal_image === $member->image && $member->image_public_id) {
                        $member->modal_image = $member->image;
                        $member->modal_image_public_id = $member->image_public_id;
                        $updated = true;
                    }
                }
            }

            if ($updated && !$dryRun) {
                $member->save();
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Team member image migration completed.');
    }

    protected function createTempUploadedFile($filePath)
    {
        $tempPath = tempnam(sys_get_temp_dir(), 'migrate_');
        copy($filePath, $tempPath);
        
        return new UploadedFile(
            $tempPath,
            basename($filePath),
            mime_content_type($filePath),
            null,
            true
        );
    }
}
