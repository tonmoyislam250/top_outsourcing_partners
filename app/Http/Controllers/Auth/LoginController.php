<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Middleware is handled at the route level
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        // This should not be reached due to guest middleware, but keeping as fallback
        if (Auth::check()) {
            return redirect()->intended(route('blogs.index'))
                ->with('info', 'You are already logged in.');
        }
        
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check for too many login attempts
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Increment login attempts
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     */
    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     */
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Send the response after the user was authenticated.
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        
        $this->clearLoginAttempts($request);

        return redirect()->intended(route('blogs.index'))
            ->with('success', 'Welcome back! You have been successfully logged in.');
    }

    /**
     * Get the failed login response instance.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('blogs.index')
            ->with('success', 'You have been successfully logged out.');
    }

    /**
     * Get the rate limiting throttle key for the given request.
     */
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')).'|'.$request->ip();
    }

    /**
     * Determine if the user has too many failed login attempts.
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts(
            $this->throttleKey($request), 5 // 5 attempts
        );
    }

    /**
     * Increment the login attempts for the user.
     */
    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit(
            $this->throttleKey($request), 60 * 15 // 15 minutes
        );
    }

    /**
     * Clear the login locks for the given user credentials.
     */
    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }

    /**
     * Fire an event when a lockout occurs.
     */
    protected function fireLockoutEvent(Request $request)
    {
        // Could fire a lockout event here if needed
    }

    /**
     * Redirect the user after determining they are locked out.
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            'email' => [trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ]);
    }
}
