<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['count']);
    }

    public function index()
    {
        $cart = 0;
        if (Auth::check()) {
            $cart = \Cart::session(Auth::user()->id)->getContent();
        }
        return view('cart', [
            'cartItems' => $cart
        ]);
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            $product = Product::findorFail($request->id);
            $cart = \Cart::session(Auth::user()->id)->add([
                [
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => [
                        'image' => $product->featured_image,
                        'is_discount' => 0
                    ],
                    'associatedModel' => $product,
                ]
            ]);
            if ($cart) {
                $counter = \Cart::session(auth()->user()->id)->getContent()->count();
                return response()->json(["total_products" => $counter], 200);
            } else {
                return response()->json(["message" => "something"], 403);
            }
        } else {
            return response()->json(["message" => "Login First"], 403);
        }
    }

    public function remove(Request $request)
    {
        // $product = Product::findorFail($request->id);
        $cart = \Cart::session(Auth::user()->id)->remove($request->id);
        if ($cart) {
            $counter = \Cart::session(auth()->user()->id)->getContent()->count();
            return response()->json(["total_products" => $counter], 200);
        } else {
            return response()->json(["message" => "something"], 403);
        }
    }

    public function count()
    {
        $counter = 0;
        if (Auth::check()) {
            $counter = \Cart::session(auth()->user()->id)->getContent()->count();
        }
        return response()->json(["total_products" => $counter], 200);
    }
}
