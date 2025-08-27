<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderGithubController extends Controller
{
    public function redirect()
    {
        try {
            return Socialite::driver('github')->redirect();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

    public function callback()
    {
        try {
            $provider = Socialite::driver('github')->user();

            $user = User::updateOrCreate([
                'provider_id' => $provider->id,
                'provider_name' => 'github',
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
