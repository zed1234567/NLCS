<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;
use \App\Invoice;
use \App\InvoiceDetail;
use \App\Product;
class InvoiceController extends Controller
{
    //
    public function storeInvoice(Request $request){
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => ['regex:/(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/'],
            'customer_address' =>'required'
        ]);
        $customer = Customer::create($data);
        $invoiceData = [
            'customer_id' => $customer->id,
            'status' => "Đã Nhận"
        ];
        $invoice = Invoice::create($invoiceData);
        foreach(session('cart') as $id => $product){
            $invoiceDetail = [
                'product_id' => $id,
                'invoice_id' => $invoice->id,
                'price' => $product['price'],
                'quantity' => $product['quantity']
            ];
            InvoiceDetail::create($invoiceDetail);
            $productUpdateQquantity = Product::find($id);
            $productUpdateQquantity->update(['quantity' => ($productUpdateQquantity->quantity - $product['quantity'])]);
        }
        session()->forget('cart');
        return back();

    }
    
    public function index(){
        $invoice = Invoice::all();
        return view('admin.invoice',compact('invoice'));
    }

    
}
