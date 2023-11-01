<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('start/register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email:dns,rfc|max:255|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berformat valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        Auth::login($user);
        return redirect('/auth')->with('sukses', 'Daftar Berhasil! Masuk Kembali');
    }

    public function updateName(Request $request)
{
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->save();
    
    return redirect()->back()->with('success', 'Name updated successfully');
}

public function updateUsername(Request $request)
{
    $user = Auth::user();
    $user->username = $request->input('username');
    $user->save();
    
    return redirect()->back()->with('success', 'Username updated successfully');
}

public function updateEmail(Request $request)
{
    $user = Auth::user();
    $user->email = $request->input('email');
    $user->save();
    
    return redirect()->back()->with('success', 'Email updated successfully');
}

public function updatePassword(Request $request)
{
    $user = Auth::user();
    $user->password = Hash::make($request->input('password'));
    $user->save();
    
    return redirect()->back()->with('success', 'Password updated successfully');
}

}
