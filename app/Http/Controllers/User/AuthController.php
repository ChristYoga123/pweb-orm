<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallBack()
    {
        $callback = Socialite::driver("google")->stateless()->user();
        $data = [
            "name" => $callback->getName(),
            "email" => $callback->getEmail(),
        ];

        // check if user is exists and if it isn't, create it
        $user = User::firstOrCreate([
            "name" => $data["name"],
            "email" => $data["email"],
        ]);


        Auth::login($user, true);

        return redirect("/");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
