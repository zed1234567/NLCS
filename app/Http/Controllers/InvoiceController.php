<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;
use \App\Invoice;
use \App\InvoiceDetail;
use \App\Product;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    //
    public function storeInvoice(Request $request){

       
        
        if($request->isCustomerExit != 1){
            $customer = Customer::create($this->validateRequest());
           
        }else{
            $customer = Customer::where('customer_phone',$request->customer_phone)->first();
            $customer->update($this->validateRequest());
        }
       
        $invoiceData = [
            'customer_id' => $customer->id,
            'status' => "Đã tiếp nhận đơn hàng"
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
        return back()->with('idInvoice',$invoice->id);

    }

    public function update(Invoice $invoice){
        $invoice->update(['status' => 'Completed']);
        return back();
    }

    public function validateRequest(){
        //English and Vietnamese
        $regex = "aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆ
        fFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTu
        UùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ";
        //'2' radio address checked
        if(request()->input('address') == '2'){
            $data = request()->validate([
                'customer_name' => "required|regex:/^[".$regex."]+(([',. -][".$regex." ])?[".$regex."]*)*$/",
                'customer_phone' => ['regex:/(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/'],
                'customer_address' => 'required|min:10'
            ]);
        }else{
            $data = request()->validate([
                'customer_name' => "required|regex:/^[".$regex."]+(([',. -][".$regex." ])?[".$regex."]*)*$/",
                'customer_phone' => ['regex:/(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/'],
            ]);
            $data['customer_address'] = "Tại cửa hàng.";
        }
        return $data;
    }
    
    public function index(){
        $invoices = Invoice::paginate(5);
        
        $total = InvoiceDetail::get()->sum('price','*','quantity');

        $totalByMonth = DB::table('invoice_details')
                            ->select(DB::raw('sum(price*quantity) as total'),DB::raw('MONTH(created_at) as month'),DB::raw('YEAR(created_at) as year'))
                            ->groupBy('month','year')->get();
        // dd($totalByMonth);
        
        $totalEachInvoice = DB::table('invoice_details')
                                ->select('invoice_id',DB::raw('sum(price*quantity) as total'))
                                ->groupBy('invoice_id')->get();

        $products = Product::join('invoice_details','products.id','=','invoice_details.product_id')
                                ->select('invoice_details.invoice_id','invoice_details.quantity','products.name','invoice_details.price')
                                ->withTrashed()->get();
        // dd($products);
        return view('admin.invoice',compact('invoices','total','totalByMonth','totalEachInvoice','products'));
    }

    
}
