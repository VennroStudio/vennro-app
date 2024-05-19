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
            'notifiable_type' => 'Subscription',
            'notifiable_id' => $subscription->id,
        ]);
    }

    public function handleSubscriptionDeleted(SubscriptionDeleted $event)
    {
        $subscription = $event->subscription;
        Notification::where('notifiable_id', $subscription->id)
            ->delete();
    }
}


