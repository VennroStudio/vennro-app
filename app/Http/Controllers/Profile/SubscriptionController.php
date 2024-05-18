<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Events\SubscriptionCreated;
use App\Events\SubscriptionDeleted;
use App\Http\Requests\Profile\SubscriptionsRequest;

class SubscriptionController extends Controller
{
    public function subscribe(SubscriptionsRequest $request) {
        $data = $request->validated();
        $subscription = Subscription::create($data);
        event(new SubscriptionCreated($subscription));
        return back();
    }


    public function unsubscribe(SubscriptionsRequest $request) {

        $subscriberId = $request->input('subscriber_id');
        $subscribedToId = $request->input('subscribed_to_id');
        $subscription = Subscription::where('subscriber_id', $subscriberId)
            ->where('subscribed_to_id', $subscribedToId)
            ->first();
        $subscription->delete();
        event(new SubscriptionDeleted($subscription));
        return back();
    }
}
