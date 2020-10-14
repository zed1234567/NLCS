<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ProductController extends Controller
{
    //
    public function index(){
        $products = \App\Product::all();
        return view('product.index',compact('products'));
    }

    public function create(){
        $brands = \App\Brand::all();
        $groups = \App\Group::all();
        return view('product.create', compact('brands','groups'));
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'group' => 'required',
            'brand' => 'required',
            
        ]);

        if(request()->has('')){}
    }
}
