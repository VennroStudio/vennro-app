<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required','string']
        ]);

        if (!Auth::attempt($credentials, $remember = true)) {
            return back()
            ->withInput()
            ->withErrors([
                'login' => 'Неверный логин или пароль',
            ]);
        }

        $user = Auth::user();
        $request->session()->regenerate();
        $user->last_activity = now();
        $user->status = 'online';
        $user->save();
        return redirect()->route('profile.show', ['userId' => $user->id]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
