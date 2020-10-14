@extends('admin.index')

@section('content')
   <div class="container-fluid mt-lg-5">
       <div class="row shadow py-5">
            <div class="col">
                <h3 class="text-center mb-5">Danh sách sản phẩm</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Hình Ảnh</th>
                            <th>Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td scope="row">{{ $product->id}}</td>
                                <td> {{ $product->name}}</td>
                                <td> {{ $product->price}}</td>
                                <td>{{}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>
   </div>
@endsection