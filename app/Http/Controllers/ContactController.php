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

        Mail::send([], [], function ($message) use ($data) {
            $message->to('your-email@example.com')
                ->subject('New Contact Form Submission')
                ->setBody("
                    Name: {$data['name']}
                    Email: {$data['email']}
                    Phone: {$data['phone']}
                    Fax: {$data['fax']}
                    Message: {$data['message']}
                ", 'text/plain');
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
