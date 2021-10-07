<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('auth.login');
    }
    public function login()
    {
        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($validated)) {

            request()->session()->regenerate();

            return redirect(route('home'));
        } else {
            return redirect(route('login'));
        }
    }

    public function register()
    {
        $validated = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'unique:users,email|email:dns',
            'password' => 'confirmed|required|min:5',
        ]);

        $user = new User();

        $user->name = request()->name;
        $user->username = request()->username;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->save();

        return redirect(route('login'))->with('pesan', 'User terdaftar, mintalah aktivasi pada admin');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        $pesan = array(
            'title' => 'Terimakasih.',
            'text' => 'Anda telah Logout',
            'icon' => 'info'
        );

        return redirect('/')->with('pesan', $pesan);
    }
}
