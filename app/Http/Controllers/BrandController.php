<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    //
    public function store(){
        $data = request()->all();
        Brand::create($data);
        return back();
    }

    public function destroy(Brand $brand){
        $brand->delete();
        return back();
    }
}
