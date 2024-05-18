<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $notifications = Notification::with(['event', 'user', 'relatedUser'])
            ->where('related_user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile.notifications', compact('notifications'));
    }
}
