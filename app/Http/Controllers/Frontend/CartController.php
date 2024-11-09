<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($existing_cart == null) {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'name' => $request->name,
                'image' => $request->image,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->input('quantity'),
                'total_amount' => $request->price * $request->input('quantity'),
            ]);
        } else {
            $new_quantity = $existing_cart->quantity + $request->input('quantity');
            $new_total_amount = $existing_cart->price * $new_quantity;

            $existing_cart->update([
                'quantity' => $new_quantity,
                'total_amount' => $new_total_amount,
            ]);
        }

        return redirect()->route('show.cart');
    }

    public function cart()
    {
        $products = Product::orderBy('category_id', 'asc')->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $grand_total = Cart::where('user_id', auth()->user()->id)->sum('total_amount');

        return view('frontend.cart.index', compact('carts', 'grand_total', 'products'));
    }

    public function removeItem($id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function prepareCheckout(Request $request)
    {
        $value = $request->grand_total;
        $exchangeRate = 15849; //nilai dolar dalam rupiah
        $convert = number_format($value / $exchangeRate, 2, '.', ''); //convert menjadi dolar
        $grand_total = Session::put('grand_total', $convert);
        $newPrice = Session::get($grand_total);

        if ($newPrice > 0) {
            return redirect()->route('cart.checkout');
        }
    }

    public function cartCheckout()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $grand_total = Cart::where('user_id', auth()->user()->id)->sum('total_amount');

        return view('frontend.cart.checkout', compact('grand_total'));
    }

    public function proccessCheckout(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'state' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'grand_total' => 'required',
        ]);

        Order::create([
            'user_id' => auth()->user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'state' => $request->state,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'grand_total' => $request->input('grand_total'),
            'status' => 'processing',
        ]);

        return redirect()->route('payment');
    }

    public function payment()
    {

        return view('frontend.cart.pay');
    }

    public function success()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->delete();


        Session::forget('grand_total');
        return view('frontend.cart.success');
    }
}
