<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    private function throttleKey(Request $request): string
    {
        return 'login|' . strtolower($request->input('email', '')) . '|' . $request->ip();
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => __('validation.required_email'),
            'email.email' => __('validation.string_email'),
            'password.required' => __('validation.required_password'),
        ]);

        $throttleKey = $this->throttleKey($request);

        // Check if temporarily blocked
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds  = RateLimiter::availableIn($throttleKey);
            $hours    = floor($seconds / 3600);
            $minutes  = ceil(($seconds % 3600) / 60);

            if ($hours > 0) {
                $timeMsg = $hours . ' hour' . ($hours > 1 ? 's' : '');
                if ($minutes > 0) {
                    $timeMsg .= ' ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '');
                }
            } else {
                $timeMsg = $minutes . ' minute' . ($minutes > 1 ? 's' : '');
            }

            return back()->withErrors([
                'email' => "Too many failed login attempts. Your account is temporarily blocked. Please try again after {$timeMsg}.",
            ])->withInput($request->only('email'));
        }

        if (Auth::attempt($credentials)) {
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                $this->applyUserLanguage(Auth::user());
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('login')->with('error', 'You do not have admin access.');
        }

        // Record failed attempt (blocks for 2 hours after 5 failures)
        RateLimiter::hit($throttleKey, 7200);

        $attempts  = RateLimiter::attempts($throttleKey);
        $remaining = 5 - $attempts;

        if ($remaining > 0) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records. ' . $remaining . ' attempt' . ($remaining > 1 ? 's' : '') . ' remaining before temporary block.',
            ])->withInput($request->only('email'));
        }

        return back()->withErrors([
            'email' => 'Too many failed login attempts. Your account has been temporarily blocked for 2 hours.',
        ])->withInput($request->only('email'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'name.required' => __('validation.required_name'),
            'name.string' => __('validation.string_name'),
            'name.max' => __('validation.max_name'),
            'email.required' => __('validation.required_email'),
            'email.string' => __('validation.string_email'),
            'email.unique' => __('validation.email_unique'),
            'password.required' => __('validation.required_password'),
            'password.string' => __('validation.string_password'),
            'password.min' => __('validation.min_password'),
            'password.confirmed' => __('validation.confirmed_password'),
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => true // Set as admin by default
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['email' => 'Google authentication failed: ' . $e->getMessage()]);
        }

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'No account found for this Google email. Please contact the administrator.']);
        }

        if (!$user->isAdmin()) {
            return redirect()->route('login')->with('error', 'You do not have admin access.');
        }

        Auth::login($user, true);
        request()->session()->regenerate();
        $this->applyUserLanguage($user);

        return redirect()->route('admin.dashboard');
    }

    private function applyUserLanguage(User $user): void
    {
        if ($user->language) {
            session(['locale' => $user->language]);
        } else {
            session(['show_language_popup' => true]);
        }
    }

    public function saveLanguage(Request $request)
    {
        $locale = $request->input('language');
        if (!in_array($locale, ['en', 'gu'])) {
            return response()->json(['error' => 'Invalid language'], 422);
        }

        Auth::user()->update(['language' => $locale]);
        session(['locale' => $locale]);
        session()->forget('show_language_popup');

        return response()->json(['success' => true]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
