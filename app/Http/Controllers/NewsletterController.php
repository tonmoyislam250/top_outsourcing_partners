<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
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
                }
            } else {
                // Create new subscriber
                NewsletterSubscriber::create([
                    'email' => $email,
                    'subscribed_at' => now(),
                    'is_active' => true
                ]);
            }
            
            // Send confirmation email (optional)
            // Mail::to($email)->send(new NewsletterConfirmation($email));
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! You\'ll receive our latest insights and updates.'
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Newsletter subscription error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
