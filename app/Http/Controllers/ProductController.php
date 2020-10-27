<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Group;
use App\ProductImage;
class ProductController extends Controller
{
    //----------Admin------------------------------------ 
    public function index(){
        $products = Product::paginate(4);
        return view('product.index',compact('products'));
    }

    public function create(){
        $brands = Brand::all();
        $groups = Group::all();
        return view('product.create', compact('brands','groups'));
    }

    public function store(Request $request){
        $product = Product::create($this->validateProduct());

        if($files =request()->file('image')){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->move('uploads',$name);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $name
                ]);

            }
        }
       return redirect()->route('product.index')->with('message','Đã thêm!');
    }

    public function edit(Product $product){
        $brands = Brand::all();
        $groups = Group::all();
        return view('product.edit',compact('product','brands','groups'));
    }

    public function update(Product $product){
        
        $product->update($this->validateProduct());
        if($files =request()->file('image')){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->move('uploads',$name);
                $image = ProductImage::where('product_id',$product->id)->first();
                $image->update(['image' => $name]);
                
            }
        }
        return back();

    }

    public function destroy(Product $product){
        $name = $product->name;
        $product->delete();
        return back()->with('message',"Đã Xóa ". $name);
    }

    private function validateProduct(){
        return request()->validate([
            'name' => 'required|min:10',
            'price' => 'required',
            'quantity' => 'required',
            'group_id' => 'required',
            'brand_id' => 'required',
            'description' => 'nullable',
        ]);
    }


    public function createGB(){
        $brands = Brand::all();
        $groups = Group::all();
        return view('product.group-brand',compact('brands','groups'));
    }
    // ------------------------------------------------------

    //--------Detail item
    public function show($item){
        $product = Product::findOrFail($item);
        return view('layouts.item',compact('product'));
    }

    //--------Shopping Cart
    public function cartIndex(){
        return view('layouts.cart');
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
       
        $cart = session()->get('cart');
        
        if(!$cart){
            $cart = [
                $id => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1
                ]
                ];
            
            session()->put('cart',$cart);
            return redirect()->back()->with('msg',"Da Them");
        }


        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ];

        session()->put('cart',$cart);
        return redirect()->back()->with('msg',"Da Them");
    }

    public function updateFormCart(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put("cart",$cart);
        }
    }

    public function removeFormCart(Request $request){
        if($request->id){
            
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
        }
    }

}
