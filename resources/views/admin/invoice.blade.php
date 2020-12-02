@extends('admin.index')

@section('content')
<div class="container-fluid mt-2">
       <div class="row shadow py-2">
            <div class="col">
                <div class="row">
                    <div class="col-6">
                         <h3 class="text-left my-4">Danh sách hóa đơn</h3>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center ">
                        <h4 class="text-right my-4">Tổng doanh thu:  {{number_format($total)}} ₫</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#modelId">Chi Tiết</button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">CHI TIẾT DOANH THU TỪNG THÁNG</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                       @foreach($totalByMonth as $month)
                                            <h6>Tháng {{ $month->month }} năm {{ $month->year }}</h6>
                                            <p>Doanh thu: {{ number_format($month->total) }} ₫</p>
                                       @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr class="align-items-center">
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
                                    <button class="btn btn-sm" data-toggle="collapse" data-target="#invoice{{$invoice->id}}">
                                        <i class="fas fa-info-circle fa-lg"></i>
                                    </button>
                                </td>
                                <td>
                                    @if($invoice->status != 'Completed')
                                        <form action="{{ route('invoice.update',$invoice->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-info">Complete</button>
                                        </form>
                                    @else
                                        <span><i class="far fa-check-circle fa-lg text-success"></i></span>
                                    @endif
                                </td>
                               
                            </tr>
                            <tr>
                                <td colspan="9">
                                    <div class="collapse" id="invoice{{$invoice->id}}">
                                        
                                       
                                            @foreach($products as $product)
                                                @if($product->invoice_id == $invoice->id)
                                                    <div class="d-flex justify-content-around text-left">
                                                        <p>Name: {{$product->name}}</p>
                                                        <p>Price: {{ number_format($product->price)}}₫</p>
                                                        <p>Quantity: {{$product->quantity}}</p>
                                                        
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