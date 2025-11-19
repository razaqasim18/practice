<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = \Cart::session(Auth::user()->id)->getContent();
        return view('checkout', [
            'cart' => $cart
        ]);
    }

    public function checkoutProcess(Request $request) {}
}
