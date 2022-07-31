<?php

namespace App\Models;

use Stripe\Stripe;
use Slim\Http\Request;
use Slim\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function confirm()
    {
        $order = Order::where('user_id', Auth::id())->get();
        $total = Order::where('user_id', Auth::id())->sum(DB::raw('price * qty'));
        require 'vendor/autoload.php';

        \Stripe\Stripe::setApiKey('pk_test_51LNycfJzdcJ4eiUECFeoRoVgYml5SfcMBRt6v2WoRn9gdnGAQMdqepjYgCeKrGE2P5LWZmPmftxhQfgBK3k7CPmB00HUaaJetj');

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "$order->products->name",
                    ],
                    'unit_amount' => $total,
                ],
                'quantity' => $order->sum('qty'),
            ]],
            'mode' => 'payment',
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
        ]);
    }
}
