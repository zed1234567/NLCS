@extends('admin.index')

@section('content')
    <div class="container-fluid mt-lg-5">
        <div class="row shadow py-5">
            <div class="col-6">
                <h4 class="text-center">Bảng nhóm hàng hóa</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->group}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              
                <h4 class="text-center">Thêm nhóm hàng mới</h4>
                <form action="{{ route('group.store') }}" class="form-inline" method="post">
                    @csrf
                    <label for="Group">Tên Nhóm </label>
                    <input type="text" name="group" placeholder="Nhập nhóm hàng hóa" required class="form-control m-3">
                    <button type="submit" class="btn btn btn-primary">Thêm</button>
                </form>
            </div> 

            <div class="col-6 table-responsive-sm">
                <h4 class="text-center">Bảng thương hiệu hàng hóa</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->brand}}</td>
                            <td>
                                <form action="{{ route('brand.destroy',$brand->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <h4 class="text-center">Thêm thương hiệu mới</h4>
                <form action="{{ route('brand.store') }}" class="form-inline" method="post">
                    @csrf
                    <label for="Brand">Tên Thương hiệu </label>
                    <input type="text" name="brand" placeholder="Nhập tên thương hiệu" required class="form-control m-3">
                    <button type="submit" class="btn btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection