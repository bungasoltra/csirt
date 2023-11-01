<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('start/index');
    }

    public function login(Request $request, RateLimiter $limiter)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns|max:255',
            'password' => 'required|min:5|max:8',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berformat valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus minimal 5 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 8 karakter.',
        ]);

        $key = 'login.' . $request->ip();
        $maxAttempts = 5; // Jumlah maksimum percobaan login
        $decayMinutes = 1; // Waktu penundaan dalam menit
        $limiter->hit($key, $decayMinutes * 60);
        $remainingTime = $limiter->availableIn($key);
        session()->put('timeRemaining', $remainingTime);

        if ($limiter->tooManyAttempts($key, $maxAttempts)) {
            $seconds = $limiter->availableIn($key);

            return back()
                ->with('loginfail', "Anda mencoba terlalu banyak login. Silahkan tunggu dalam $seconds detik.");
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $limiter->clear($key); // Reset percobaan login yang berhasil
            return redirect()->intended('dashboard');
        }

        $limiter->hit($key, $decayMinutes * 60); // Menambah hit pada Rate Limiter
        return back()->with('error', 'Login anda gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth');
    }

    public function profile()
    {
        $getuser = User::all();
        return view('profile.index', [
            "title" => "Your Profile",
            "user" => $getuser,
        ]);
    }
}
