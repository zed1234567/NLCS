<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Group;
use App\ProductImage;
class ProductController extends Controller
{
    //
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
        $data = request()->validate([
            'name' => 'required|min:10',
            'price' => 'required',
            'quantity' => 'required',
            'group_id' => 'required',
            'brand_id' => 'required',
            'description' => 'nullable',
        ]);
        $product = Product::create($data);

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

    public function show($item){
        $product = Product::findOrFail($item);
        return view('layouts.item',compact('product'));
    }

    public function createGB(){
        $brands = Brand::all();
        $groups = Group::all();
        return view('product.group-brand',compact('brands','groups'));
    }
}
