<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        return view('profile.notifications');
    }
}
