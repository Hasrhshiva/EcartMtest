<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::where('user_id',auth()->user()->id)->paginate(3);
        return view('adminpanel.products.index',compact('products'));
    }

    public function create(){

        return view('adminpanel.products.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'products_name' => 'required',
            'price' => 'required',
            'product_image_main' => 'required|mimes:jpg,jpeg,png,bmp|max:4096',
            'product_images.*' => 'required|mimes:jpg,jpeg,png,bmp|max:4096',
        ]);
        if( $request->file('product_image_main')){
            $productImageMain = 'product'.time() . '.' . $request->product_image_main->extension();
            $request->product_image_main->move(public_path('product-images'), $productImageMain);
            $productImageMain = $productImageMain;
            }
            else{
            $productImageMain = '';
    
            }

        $products = new Product();
        $products->user_id = Auth::user()->id; 
        $products->product_name	 = $request->products_name;
        $products->price = $request->price;
        $products->product_image = $productImageMain;
        $products->description = $request->long_description;
        $products->status = $request->status;
        $products->save();

        $images = $request->file('product_images');
        $imagePaths = [];
           
        foreach ($images as $image) {
            // dd($image);
            if( $request->file('product_images')){
                $productImage = 'product'.time() . '.' . $image->extension();
                $image->move(public_path('product-images'), $productImage);
                $productImage = $productImage;
                }
                else{
                $productImage = '';
        
                }
            ProductImage::create([
                'product_id' => $products->id,
                'file' => $productImage,
            ]);
        }

        return back()->with('success', ' Product Created successfully.');
    }

    public function edit(){

        return view('adminpanel.products.edit');
    }

    public function delete($id){
        if($id){
        Product::where('id',$id)->delete();
            return back()->with('success', ' Product Deleted successfully.');
        }
        else{
            return back()->with('error', 'This Product Is missing in Database');
        }
       
    }
}
