<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'business_phone' => 'required|string|max:20',
            'business_email' => 'required|email|max:255',
            'services' => 'required|string',
            'start_time' => 'required|string',
            'team_members' => 'required|string',
            'outsourcing_journey' => 'required|string',
            'additional_info' => 'nullable|string',
        ]);

        try {
            Mail::send('emails.consultation', ['data' => $data], function ($message) use ($data) {
                $message->to(env('CONSULTATION_FORM_RECIPIENT'))
                    ->subject('New Consultation Request')
                    ->from(env('MAIL_FROM_ADDRESS'), $data['first_name'] . ' ' . $data['last_name']);
            });

            return response()->json(['success' => true, 'message' => 'Your consultation request has been sent successfully!']);
        } catch (\Exception $e) {
            Log::error('Consultation email sending failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send your consultation request. Please try again later.']);
        }
    }
}
