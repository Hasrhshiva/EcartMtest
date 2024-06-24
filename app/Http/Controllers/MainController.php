<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\State;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $data = Product::where('status',1);
        $products = $data->get();
        $products_count = $data->count();
        return view('welcome',compact('products','products_count'));
    }

    public function cartList($id){
        $products_all = Product::where('status',1)->where('id','!=',$id)->get();
        $product = Product::where('id',$id)->first();
        $product_images  = ProductImage::where('product_id',$id)->paginate(3);
        return view('carlist.index',compact('product','products_all','product_images'));
    }

    public function states(Request $request){
        $states= State::select('id','state_name')->where('country_id',$request->id)->get();
        return response()->json(array('states'=>$states)); 

    }
}
