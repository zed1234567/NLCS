<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Group;
use App\ProductImage;
use App\Customer;
class ProductController extends Controller
{
    //-------------------------Admin----------------------------------
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
       
        $this->validate($request,[
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

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
            $links=[];
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->move('uploads',$name);
                array_unshift($links,$name);
            }
            $images = ProductImage::where('product_id',$product->id)->limit(count($links))->get();
            $i=0;
            foreach($images as $image){
                $image->update(['image' => $links[$i]]);
                $i++;
            }
        }
        return back()->with('message','Đã Lưu!');
    }
    //-----------------------------Soft delete----------------------------------
    public function trash(){
        $products = Product::onlyTrashed()->paginate(4);
        return view('product.trash',compact('products'));
    }

    public function destroy(Product $product){
        $name = $product->name;
        $product->delete();
        return back()->with('message',"Đã Xóa ". $name);
    }

    public function restore($id){
        Product::withTrashed()->where('id',$id)->restore();
        return redirect()->route('product.index')->with('message','Đã Phục Hồi!');
    }
    //---------------------------End Soft Delete ---------------------------------
    private function validateProduct(){
        return request()->validate([
            'name' => 'required|min:10',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gte:0',
            'group_id' => 'required',
            'brand_id' => 'required',
            'description' => ["regex:/(([a-zA-Z0-9. ',])+([|])){5}+([a-zA-Z0-9. ',]{1,})$/"],
        ]);
    }


    public function createGB(){
        $brands = Brand::all();
        $groups = Group::all();
        return view('product.group-brand',compact('brands','groups'));
    }
    // ------------------------End Admin------------------------------

    //--------Detail item
    public function show($item){
        $product = Product::findOrFail($item);
        $products = Product::where('brand_id',$product->brand_id)->where('name','<>',$product->name)->limit(4)->get();
        $data = explode("|",$product['description']);
        $descriptions = [
            "Màn Hình" => $data[0],
            "Hệ Điều Hành" => $data[1],
            "CPU" => $data[2],
            "RAM" => $data[3],
            "Bộ Nhớ" => $data[4],
            "Chất Liệu" => $data[5]
        ];
        
        return view('layouts.item',compact('product','descriptions','products'));
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
                    'quantity' => 1,
                    'img' => $product->images[0]->image
                    ]
                ];
            
            session()->put('cart',$cart);
            return redirect()->route('cart.index');
        }


        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'img' => $product->images[0]->image
        ];

        session()->put('cart',$cart);
        return redirect()->route('cart.index');
    }

    public function updateFormCart(Request $request){
        if($request->id && $request->quantity){
            $quantityFromData = Product::select('quantity')->where('id',$request->id)->first()->quantity;

            $cart = session()->get('cart');
            if($request->quantity > $quantityFromData){
                $cart[$request->id]['quantity'] = $quantityFromData; //Set quantity == max quantity in database
            }else{
                $cart[$request->id]['quantity'] = $request->quantity;
            }
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

    public function filterProduct(Request $request){

        $minPrice =['1' => '5000000','2' => '15000000','3'=>'25000000'];
        $product = Product::query();

        if($request->has('brand') && $request->brand != null){
            $product = $product->where([
                'group_id' => $request->type,
                'brand_id' => $request->brand
            ]);
        }
        if($request->has('price') && $request->price ==1){
            $product->where('group_id',$request->type)->where('price','<=',$minPrice['1']);
        }

        if($request->has('price') && $request->price ==2){
            $product->where('group_id',$request->type)->whereBetween('price',[$minPrice['1'],$minPrice['2']]);
        }

        if($request->has('price') && $request->price ==3){
            $product->where('group_id',$request->type)->whereBetween('price',[$minPrice['2'],$minPrice['3']]);
        }

        if($request->has('price') && $request->price ==4){
            $product->where('group_id',$request->type)->where('price','>=',$minPrice['3']);
        }

        if($request->has('sort') && $request->sort == "DESC"){
            $product = $product->where('group_id',$request->type)->orderBy('price','DESC');
        }

        if($request->has('sort') && $request->sort == "ASC"){
            $product = $product->where('group_id',$request->type)->orderBy('price','ASC');
        }

        $products= $product->get();
        return view('layouts.print',compact('products'));
    }
    //--------------------------
    
}
