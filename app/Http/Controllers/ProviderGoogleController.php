<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderGoogleController extends Controller
{
        public function redirect()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

    public function callback()
    {
        try {
            $provider = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'provider_id' => $provider->id,
                'provider_name' => 'google',
            ], [
                'name' => $provider->name,
                'email' => $provider->email,
                'provider_token' => $provider->token,
                'provider_refresh_token' => $provider->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['provider' => 'Oops something went wrong.']);
        }
    }
}
