<?php

namespace App\Listeners;

use App\Events\SubscriptionCreated;
use App\Events\SubscriptionDeleted;
use App\Models\Notification;

class NotificationSubscription
{
    public function handleSubscriptionCreated(SubscriptionCreated $event)
    {
        $subscription = $event->subscription;
        Notification::create([
            'user_id' => $subscription->subscriber_id,
            'related_user_id' => $subscription->subscribed_to_id,
            'event_id' => 1,
            'status' => 1,
        ]);
    }

    public function handleSubscriptionDeleted(SubscriptionDeleted $event)
    {
        $subscription = $event->subscription;
        $notification = Notification::where('user_id', $subscription->subscriber_id)
            ->where('related_user_id', $subscription->subscribed_to_id)
            ->first();

        if ($notification) {
            $notification->delete();
        }
    }
}


