<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('tonmoyk983@gmail.com')
                ->subject('New Contact Form Submission');
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
