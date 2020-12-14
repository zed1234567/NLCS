<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    //Autofill customer info when customer enter phone number
    public function checkInfoCustomer(Request $request){
        $isCustomer = Customer::where('customer_phone','=',$request->phone)->count();

        if($isCustomer == 1){
            $customer = Customer::where('customer_phone','=',$request->phone)->get();
            return $customer;
        }
        return 0;
    }
}
