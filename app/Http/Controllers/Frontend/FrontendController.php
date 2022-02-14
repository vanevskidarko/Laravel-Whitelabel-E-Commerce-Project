<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function category(){
        $category = Category::where('status',1)->get();
        return view('frontend.category',compact('category'));
    }

    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){
           $category = Category::where('slug',$slug)->first();
            $products = Product::where('category_id',$category->id)->where('status','1')->get();
            return view('frontend.products.index',compact('category','products'));
        } else{
            return redirect('/')->with('status','That type of category does not seem to have a slug');
        }
    }

    public function productView($slug,$prod_name){
        if(Category::where('slug',$slug)->exists()){
                $products = Product::where('name',$prod_name)->first();
                return view('frontend.products.view',compact('products'));
                return redirect('/')->with('status','Not found');
        }else{
            return redirect('/')->with('status','No category');
        }
    }
}
