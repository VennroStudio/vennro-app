<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class UserActivityController extends Controller
{
    public function online(Request $request)
    {
        $user = Auth::user();
        $user->last_activity = now();
        $user->status = 'online';
        $user->save();

    }
    public function offline(Request $request)
    {
        $users = User::where('last_activity', '<', Carbon::now()->subMinutes(2))->get();

        foreach ($users as $user) {
            $user->status = 'offline';
            $user->save();
        }

    }
}

