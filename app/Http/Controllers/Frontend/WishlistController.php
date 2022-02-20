<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class WishlistController extends Controller
{
    //
    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }

    public function add(Request $req){
        if(Auth::check()){
            $product_id = $req->input('product_id');
            if(Product::find($product_id)){
                $wishlist = new Wishlist();
                $wishlist->product_id = $product_id;
                $wishlist->user_id    = Auth::id();
                $wishlist->save();
                return response()->json(['status'=>"Added to wishlist!"]);
            }
            else{
                return response()->json(['status'=>"Already added to wishlist!"]);
            }
        } else{
            return response()->json(['status'=>"Login to continue"]);
        }
    }

    public function delete(Request $req){
        if(Auth::check()){
            $product_id = $req->input('product_id');
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartItem = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"Product Deleted"]);
            }
        } else{
            return response()->json(['status'=>'Login to continue']);
        }
    }
}
