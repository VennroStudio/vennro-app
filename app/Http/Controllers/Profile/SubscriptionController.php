<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Http\Requests\Profile\SubscriptionsRequest;
use App\Models\Notification;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionsRequest $request) {
        $subscriberId = $request->input('subscriber_id');
        $subscribedToId = $request->input('subscribed_to_id');
        $data = $request->validated();
        Subscription::create($data);
        Notification::create([
            'user_id' => $subscriberId,
            'related_user_id' => $subscribedToId,
            'event_id' => 1,
            'status' => 1,
        ]);
        return back();
    }


    public function unsubscribe(SubscriptionsRequest $request) {

        $subscriberId = $request->input('subscriber_id');
        $subscribedToId = $request->input('subscribed_to_id');
        $subscription = Subscription::where('subscriber_id', $subscriberId)
            ->where('subscribed_to_id', $subscribedToId)
            ->first();
        $notification = Notification::where('user_id', $subscriberId)
            ->where('related_user_id', $subscribedToId)
            ->first();
        $subscription->delete();
        $notification->delete();
        return back();
    }
}
