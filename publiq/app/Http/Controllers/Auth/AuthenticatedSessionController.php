<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('Profile', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function yandex()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function yandexRedirect()
    {
        $user = Socialite::driver('yandex')->user();
        $user = User::firstOrCreate([
            'email' => $user->email,
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
        ]);

        Auth::login($uesr, true);
        redirect()->route('index');
    }
}