<?php

namespace App\Jobs;

use App\Mail\NewPostNotification;
use App\Models\Blog;
use App\Models\NewsletterSubscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendNewsletterNotification implements ShouldQueue
{
    use Queueable;

    public $blog;
    public $tries = 3;
    public $timeout = 300; // 5 minutes

    /**
     * Create a new job instance.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Get all active newsletter subscribers
            $subscribers = NewsletterSubscriber::active()->get();
            
            if ($subscribers->isEmpty()) {
                Log::info('No active newsletter subscribers found.');
                return;
            }

            Log::info("Sending newsletter notification for blog: {$this->blog->title} to {$subscribers->count()} subscribers");

            // Send emails in batches to avoid overwhelming the mail server
            $subscribers->chunk(50)->each(function ($chunk) {
                foreach ($chunk as $subscriber) {
                    try {
                        // Create personalized unsubscribe URL
                        $unsubscribeUrl = route('newsletter.unsubscribe', ['email' => base64_encode($subscriber->email)]);
                        
                        $mailable = new NewPostNotification($this->blog);
                        
                        // Replace placeholder with actual email in unsubscribe URL
                        $mailable->with([
                            'unsubscribeUrl' => $unsubscribeUrl
                        ]);
                        
                        Mail::to($subscriber->email)->send($mailable);
                        
                        // Small delay between emails to avoid rate limiting
                        usleep(100000); // 0.1 seconds
                        
                    } catch (\Exception $e) {
                        Log::error("Failed to send newsletter to {$subscriber->email}: " . $e->getMessage());
                        // Continue with other subscribers even if one fails
                        continue;
                    }
                }
            });

            Log::info("Newsletter notification sent successfully for blog: {$this->blog->title}");
            
        } catch (\Exception $e) {
            Log::error("Newsletter job failed for blog {$this->blog->id}: " . $e->getMessage());
            throw $e; // Re-throw to trigger retry mechanism
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error("Newsletter job permanently failed for blog {$this->blog->id}: " . $exception->getMessage());
    }
}
