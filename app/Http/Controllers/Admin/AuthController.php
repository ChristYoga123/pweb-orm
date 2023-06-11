<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view("layouts.admin.guest");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::check() && Auth::user()->role == "Admin") {
                $request->session()->regenerate();
                return redirect()->route("admin.dashboard.index");
            }

            return redirect()->back()->with("error", "Akun anda bukan akun admin. Anda dilarang masuk");
        }

        return redirect()->back()->with("error", "Akun atau password salah. Silahkan coba kembali");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("admin.login.index");
    }
}
