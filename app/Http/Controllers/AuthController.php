<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invitee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\User\LoginUserRequest;
use Illuminate\Support\Facades\Log;

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
            // if (explode("@", $googleUser->email)[1] !== 'one1.sa') {
            //     return abort(403, 'Unauthorized action.');
            // }

            // check if they're an existing user
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = User::updateOrCreate([
                    'google_id' => $googleUser->id,
                    'email' => $googleUser->email,
                ], [
                    'name' => $googleUser->name,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);

                Invitee::create([
                    'email' => $user->email,
                    'name' => $user->name
                ]);

                $user->givePermissionTo('read_meeting');
            }
            auth()->login($user);

            return redirect()->route('home');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/login')->with('error', 'Google login failed');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
