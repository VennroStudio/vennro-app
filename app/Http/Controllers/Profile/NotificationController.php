<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Notification;


class NotificationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $notifications = Notification::with('notifiable')
            ->where('related_user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.notifications', compact('notifications'));
    }
}
