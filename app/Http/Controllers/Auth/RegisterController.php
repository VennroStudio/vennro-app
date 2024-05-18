<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required',
         'lastname' => 'required',
         'login' => 'required|unique:users',
         'password' => 'required|min:5'
        ]);
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'login' => $request->login,
            'password' => $request->password
        ]);

        Auth::login($user);
        return redirect()->route('profile', ['userId' => $user->id]);
    }
}
