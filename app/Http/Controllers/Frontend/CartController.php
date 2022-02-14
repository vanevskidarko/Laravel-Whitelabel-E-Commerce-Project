<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
                    return response()->json(['status'=> 'Added to cart']);
                }
                }
                
        }else{
            return response()->json(['status' => 'Login to continue']);
        }
    }
}
