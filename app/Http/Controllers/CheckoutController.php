<?php

namespace App\Http\Controllers;

use App\Models\DeliveryTimes;
use App\Models\Extras;
use App\Models\PaymentMethods;
use App\Models\Suburb;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getCheckOutDetails(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $deliveryTimes = DeliveryTimes::all();
        $paymentMethods = PaymentMethods::all();
        $extras = Extras::all();
        $suburbs = Suburb::all();

        return response([
            'delivery_times' => $deliveryTimes,
            'payment_methods'=> $paymentMethods,
            'extras' => $extras,
            'suburbs'=> $suburbs
        ]);

    }
}
