<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonateRequest;
use App\Models\Donation;
use Cryptomus\Api\Client;
use Cryptomus\Api\RequestBuilder;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(DonateRequest $request)
    {
        $payment = Client::payment(config('cryptomus.key'), config('cryptomus.merchant'));

        if (!$payment) {
            return response('!payment');
        }

        $donation = new Donation();
        $donation->amount = $request->amount;
        $donation->status = 'unpaid';
        $donation->username = $request->username;
        $donation->email = $request->email;
        $donation->save();

        $data = [
            'amount' => strval($request->amount),
            'currency' => 'USD',
            'order_id' => strval($donation->id),
            'url_return' => url("/donate"),
//            'url_success' => url("/donate/success"),
            'url_callback' => url("api/payment/callback"),
            'from_referral_code' => "nPdENd",
        ];

        $result = $payment->create($data);

        return response()->json([
            'success' => true,
            'response' => [
                'data' => $result['url'],
                'method' => 'url'
            ]
        ]);
    }

    public function callback(Request $request)
    {
        $donationId = $request->input('order_id');
        $donation = Donation::query()
            ->where('id', $donationId)
            ->where('status', 'unpaid')
            ->first();

        if (!$donation) {
            throw new \Exception("No checkout record found.");
        }

        $donation->status = 'paid';
        $donation->save();

        return redirect('donate')->with([
                'success' => 'Thanks for the donation. Your donation amount has been successfully deposited to the trust account.'
            ]);
    }
}
