<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartItems'));
    }

    public function placeOrder(Request $req){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->first_name = $req->input('firstname');
        $order->last_name = $req->input('lastname');
        $order->email = $req->input('email');
        $order->phone = $req->input('phone');
        $order->address1 = $req->input('address1');
        $order->address2 = $req->input('address2');
        $order->city = $req->input('city');
        $order->country = $req->input('country');
        $order->pincode = $req->input('pin');
        $total = 0;
        $cartItems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems_total as $prod){
            $total += $prod->products->selling_price * $prod->product_qty;
        }
        $order->total_price = $total;
        $order->tracking_number = 'NO.'.rand(1919,939012);
        $order->save();

        $order->id;
        $cartItems = Cart::where('user_id',Auth::id())->get();
        
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id'=> $order->id,
                'product_id'=>$item->product_id,
                'qty'=>$item->product_qty,
                'price'=>$item->products->selling_price
            ]);
            $product = Product::where('id',$item->id)->first();

        }

        if(Auth::user()->address1 == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $req->input('firstname');
            $user->last_name = $req->input('lastname');
            $user->phone = $req->input('phone');
            $user->address1 = $req->input('address1');
            $user->address2 = $req->input('address2');
            $user->city = $req->input('city');
            $user->country = $req->input('country');
            $user->pincode = $req->input('pin');
            $user->update();
        }

        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('/')->with('status','Order placed successfully');
        
    }
}
