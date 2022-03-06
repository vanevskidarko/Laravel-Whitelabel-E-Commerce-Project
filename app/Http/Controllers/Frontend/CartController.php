<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $req){
        
        $product_id = $req->input('product_id');
        $product_qty = $req->input('product_qty');

        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->exists();

            if($product_check){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status'=>'Already added']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status'=> $product_check->name.'Added to cart']);
                }
                }
                
        }else{
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function viewCart(){
        $cartItem = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart',  ['cartItem'=>$cartItem]);
    }

    public function deleteCartItems(Request $req){
        if(Auth::check()){
            $product_id = $req->input('product_id');
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"Product Deleted"]);
            }
        } else{
            return response()->json(['status'=>'Login to continue']);
        }
    }

    public function updateCart(Request $req){
        $product_id = $req->input('product_id');
        $qty = $req->input('qty');

        if(Auth::check()){
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cart->product_qty = $qty;
                $cart->update();
                return response()->json(['status'=>'Quantity Updated']);
            }
        }
    }
}
