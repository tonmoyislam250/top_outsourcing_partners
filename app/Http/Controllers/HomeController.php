<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'Accounting & Finance Outsourcing',
                'description' => 'Let us handle your finances while you focus on business growth.',
                'iconClass' => 'accounting-icon',
                'slug' => 'accounting-finance',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                            <path d="M3 22V8h18v14H3zm2-2h14V10H5v10zm2-2h2v-6H7v6zm4 0h2v-6h-2v6zm4 0h2v-6h-2v6zM3 7V5h18v2H3z"/>
                           </svg>'
            ],
            [
                'title' => 'AI Integration for Businesses',
                'description' => 'Leverage cutting-edge AI automation and analytics to boost productivity.',
                'iconClass' => 'ai-icon',
                'slug' => 'ai-integration',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                            <path d="M9 3v2H7v2H5v2H3v8h2v2h2v2h8v-2h2v-2h2v-2h2v-8h-2V9h-2V7h-2V5h-2V3H9zm0 2h6v2h2v2h2v6h-2v2h-2v2H9v-2H7v-2H5v-6h2V9h2V5zm2 4v6h2V9h-2z"/>
                           </svg>'
            ],
            [
                'title' => 'Corporate Training & Development',
                'description' => 'Upskill your workforce with industry-leading training programs.',
                'iconClass' => 'training-icon',
                'slug' => 'corporate-training',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                            <path d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v2H7V7zm0 4h10v2H7v-2zm0 4h5v2H7v-2z"/>
                           </svg>'
            ],
            [
                'title' => 'Third-Party Business Support',
                'description' => 'From HR to legal, marketing, and operational support, we provide outsourced business solutions tailored to your needs.',
                'iconClass' => 'support-icon',
                'slug' => 'business-support',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 16h2v-2h-2v2zm2-3v-1.5c0-.83.67-1.5 1.5-1.5.28 0 .5.22.5.5v.5h2v-.5c0-1.38-1.12-2.5-2.5-2.5-1.52 0-2.75 1.23-2.75 2.75V15h-2v-4h2v.5c0-1.38 1.12-2.5 2.5-2.5.17 0 .34.02.5.05.67.11 1.28.44 1.72.98.44.55.78 1.21.78 1.97V15h-2v-2h-2v2z"/>
                           </svg>'
            ],
            [
                'title' => 'Data Entry & Administrative Support',
                'description' => 'Streamline data management, documentation, and back-office operations.',
                'iconClass' => 'data-icon',
                'slug' => 'data-entry',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                            <path d="M7 3h14v14H7V3zm2 2v10h10V5H9zm-6 4h2v12h12v-2H5V9z"/>
                           </svg>'
            ],
            [
                'title' => 'Employee Training Services',
                'description' => 'Enhance workforce skills with customized training programs for partner organizations.',
                'iconClass' => 'employee-icon',
                'slug' => 'employee-training',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                           </svg>'
            ],
        ];

        return view('home', compact('services'));
    }
}