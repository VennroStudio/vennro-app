<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show($userId)
    {
        $user = User::with(['profile', 'subscriptions', 'subscribers'])->find($userId);

        $users = User::orderByRaw('CASE WHEN status = "online" THEN 0 ELSE 1 END')->get();

        return view('profile.index', ['user' => $user, 'users' => $users]);
    }
}
