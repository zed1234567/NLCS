@extends('admin.index')

@section('content')
   <div class="container-fluid mt-2">
       <div class="row shadow py-2">
            <div class="col">
                <div class="row">
                    <div class="col-6">
                         <h3 class="text-left my-4">Danh sách sản phẩm</h3>
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
               
                <table class="table  table-lg-responsive ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Nhóm</th>
                            <th>Thương hiệu</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td scope="row">{{ $product->id}}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ $product->quantity}}</td>
                                <td>{{ $product->group->group }}</td>
                                <td>{{ $product->brand->brand }}</td>
                                <td><img src="{{ asset('/uploads/'.$product->images[0]->image) }}" alt="" height=100 weight=100></td>
                                <td>{{ \Illuminate\Support\Str::limit($product->description,10,'...') }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('product.edit',$product->id) }}" class="mr-3">
                                        @csrf
                                       <button type="submit" class="btn btn-sm btn-secondary"><i class="far fa-edit"></i></button>
                                    </form>

                                    <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                       <button type="submit"  class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $products->links()}}
                </div>
            </div>
       </div>
   </div>
@endsection