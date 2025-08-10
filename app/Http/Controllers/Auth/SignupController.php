<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class SignupController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware is handled at the route level
    }

    /**
     * Show the signup form.
     */
    public function showSignupForm()
    {
        // This should not be reached due to guest middleware, but keeping as fallback
        if (Auth::check()) {
            return redirect()->intended(route('blogs.index'))
                ->with('info', 'You are already logged in.');
        }
        
        return view('auth.signup');
    }

    /**
     * Handle a registration request for the application.
     */
    public function store(Request $request)
    {
        $this->validator($request);

        $user = $this->create($request->all());

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('blogs.index')
            ->with('success', 'Welcome! Your account has been created successfully.');
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
