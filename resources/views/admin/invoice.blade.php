@extends('admin.index')

@section('content')
<div class="container-fluid mt-2">
       <div class="row shadow py-2">
            <div class="col">
                <div class="row">
                    <div class="col-6">
                         <h3 class="text-left my-4">Danh sách hóa đơn</h3>
                    </div>
                    <div class="col-6">
                        <h4 class="text-right my-4">Tổng doanh thu:  {{number_format($total)}} ₫</h4>
                    </div>
                </div>
                
                <table class="table  table-lg-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer phone</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->customer->customer_name }}</td>
                                <td>{{ $invoice->customer->customer_address }}</td>
                                <td>{{ $invoice->customer->customer_phone }}</td>
                                <td>
                                    @foreach($totalEachInvoice as $Total)
                                        @if($Total->invoice_id == $invoice->id)
                                            {{ number_format($Total->total)}}₫
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $invoice->status}}</td>
                                <td>{{ $invoice->detailInvoice->created_at}}</td>
                                <td>
                                    <button class="btn" data-toggle="collapse" data-target="#invoice{{$invoice->id}}">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div class="collapse" id="invoice{{$invoice->id}}">
                                        
                                       
                                            @foreach($products as $product)
                                                @if($product->invoice_id == $invoice->id)
                                                    <div class="d-flex justify-content-around text-left">
                                                        <p>Name: {{$product->name}}</p>
                                                        <p>Price: {{ number_format($invoice->detailInvoice->price)}}₫</p>
                                                        <p>Quantity: {{$invoice->detailInvoice->quantity}}</p>
                                                        
                                                    </div>
                                                @endif
                                            @endforeach
                                       
                                       
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $invoices->links()}}
                </div>
                
            </div>
       </div>
   </div>
@endsection