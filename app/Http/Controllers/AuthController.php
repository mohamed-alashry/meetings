<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\User\LoginUserRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return redirect()->back()->withErrors(['email' => 'Invalid login details.']);
        }
        return redirect()->route('home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // only allow people with @company.com to login
            if (explode("@", $googleUser->email)[1] !== 'one1.sa') {
                return abort(403, 'Unauthorized action.');
            }

            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
