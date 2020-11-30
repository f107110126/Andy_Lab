<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;

// use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {

        // process the payment
        // unlock the purchase
        // product purchased
        ProductPurchased::dispatch('toy');
        // event(new ProductPurchased('toy')); // same as above

        // listeners
        // notify the user about the payment
        // Notification::send(request()->user(), new PaymentReceived());
        // request()->user()->notify(new PaymentReceived(rand(100,999)));

        // award achievements
        // send shareable coupon to user
    }
}
