<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'fax' => 'nullable|string',
            'message' => 'required|string',
        ]);

        try {
            Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
                $message->to(env('CONTACT_FORM_RECIPIENT'))
                    ->subject('Top Outsourcing Partners Contact Form Submission');
            });

            return response()->json(['success' => true, 'message' => 'Your message has been sent successfully!']);
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}
