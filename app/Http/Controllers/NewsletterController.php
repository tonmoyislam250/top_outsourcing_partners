<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Models\Blog;
use App\Jobs\SendNewsletterNotification;
use App\Mail\NewsletterWelcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Subscribe to newsletter
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->email;

        try {
            // Check if email already exists
            $existingSubscriber = NewsletterSubscriber::where('email', $email)->first();
            
            if ($existingSubscriber) {
                if ($existingSubscriber->is_active) {
                    return response()->json([
                        'success' => false,
                        'message' => 'This email is already subscribed to our newsletter.'
                    ], 409);
                } else {
                    // Reactivate inactive subscriber
                    $existingSubscriber->update([
                        'is_active' => true,
                        'subscribed_at' => now()
                    ]);
                    
                    // Send welcome email for reactivated subscriber
                    Mail::to($email)->send(new NewsletterWelcome($email));
                }
            } else {
                // Create new subscriber
                NewsletterSubscriber::create([
                    'email' => $email,
                    'subscribed_at' => now(),
                    'is_active' => true
                ]);
                
                // Send welcome email for new subscriber
                Mail::to($email)->send(new NewsletterWelcome($email));
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! Check your email for a welcome message with exclusive insights.'
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Newsletter subscription error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    /**
     * Unsubscribe from newsletter
     */
    public function unsubscribe(Request $request)
    {
        try {
            $email = base64_decode($request->email);
            
            $subscriber = NewsletterSubscriber::where('email', $email)->first();
            
            if ($subscriber) {
                $subscriber->update(['is_active' => false]);
                
                return view('emails.unsubscribe-success', [
                    'email' => $email,
                    'message' => 'You have been successfully unsubscribed from our newsletter.'
                ]);
            }
            
            return view('emails.unsubscribe-success', [
                'email' => $email,
                'message' => 'Email not found in our subscription list.'
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Newsletter unsubscribe error: ' . $e->getMessage());
            
            return view('emails.unsubscribe-success', [
                'email' => '',
                'message' => 'An error occurred while processing your request.'
            ]);
        }
    }

    /**
     * Admin dashboard for newsletter subscribers
     */
    public function adminIndex()
    {
        $subscribers = NewsletterSubscriber::latest()->paginate(20);
        $totalSubscribers = NewsletterSubscriber::count();
        $activeSubscribers = NewsletterSubscriber::active()->count();
        
        return view('admin.newsletter.index', compact('subscribers', 'totalSubscribers', 'activeSubscribers'));
    }

    /**
     * Send test newsletter
     */
    public function sendTestNewsletter(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id'
        ]);

        $blog = Blog::findOrFail($request->blog_id);
        
        // Dispatch the newsletter job
        SendNewsletterNotification::dispatch($blog);
        
        return back()->with('success', 'Test newsletter is being sent to all active subscribers!');
    }
}
