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
                        @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                    </div>
                </div>
               
                <table class="table  table-lg-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer phone</th>
                            <th>total</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                  
                </div>
            </div>
       </div>
   </div>
@endsection