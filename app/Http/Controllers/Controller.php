<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Brand;
use App\Product;
use App\Group;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $phones = $this->getProductsByGroup($this->getIdGroup("SMARTPHONE"));
        $laptops = $this->getProductsByGroup($this->getIdGroup("LAPTOP"));
        $tablets = $this->getProductsByGroup($this->getIdGroup("TABLE"));
        $types = compact('phones','laptops','tablets');
        // dd($types);
        return view('index')->with('types',$types);
    }

    public function getIdGroup($group){
        return Group::select('id')->where('group','=',$group)->first()->id;
    }

    public function getProductsByGroup($idGroup){
        return Product::where('group_id',$idGroup)->simplePaginate(8);
    }

    public function getBrandsByGroup($idGroup){
        return Product::join('groups','products.group_id','=','groups.id')
                        ->join('brands','products.brand_id','=','brands.id')
                        ->where('group_id',$idGroup)
                        ->distinct()->get(['brands.id','brands.brand']);
    }

    public function Phone(){
        $name ="SMARTPHONE";
        $id = self::getIdGroup($name);
        $products = self::getProductsByGroup($id);
        $brands = self::getBrandsByGroup($id);
        return view('layouts.phone',compact('products','brands','id','name'));
    }

    public function laptop(){
        $name ="LAPTOP";
        $id = self::getIdGroup($name);
        $products = self::getProductsByGroup($id);
        $brands = self::getBrandsByGroup($id);
        return view('layouts.laptop',compact('products','brands','id','name'));
    }
    public function tablet(){
        $name ="TABLE";
        $id = self::getIdGroup($name);
        $products = self::getProductsByGroup($id);
        $brands = self::getBrandsByGroup($id);
        return view('layouts.tablet',compact('products','brands','id','name'));
    }

    public function search(Request $request){
        $products = Product::where('name',$request->key)->orWhere('name','like','%' . $request->key . '%')->get();
        return view('layouts.search',compact('products'));
    }


}
