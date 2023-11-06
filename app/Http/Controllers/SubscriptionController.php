<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function showCancellationPage()
    {
        return view('subscription.cancel');
    }

    public function cancelSubscription(Request $request)
    {
        // Implement the cancellation logic here
        // For example, you could update the user's subscription status in the database

        return redirect('/')->with('success', 'Subscription cancelled successfully.');
    }
}
