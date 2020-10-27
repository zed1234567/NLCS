@extends('admin.index')

@section('content')
   <div class="container-fluid mt-lg-5">
       <div class="row shadow py-5">
          <div class="col">
            <h3 class="text-center mb-5">Chỉnh sửa {{$product->name}}.</h3>
            <form action="{{ route('product.update',$product->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="row">
                <div class="col-6 form-group">
                  <label for="name">Tên sản phẩm</label>
                  <input type="text"  class="form-control" name="name" placeholder="Nhập tên sản phẩm ... " required value="{{ old('name') ?? $product->name }}" autocomplete="off">
                  @error('name')
                  <strong class="text-danger">*{{ $message }}</strong>
                  @enderror
                </div>

                <div class="col-6 form-group">
                  <label for="price">Giá sản phẩm</label>
                  <input type="text"  class="form-control" name="price" placeholder="Nhập giá sản phẩm ..." required value="{{ old('price') ?? $product->price}}" autocomplete="off">
                  @error('price')
                  <strong class="text-danger">*{{ $message }}</strong>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-6 form-group">
                  <label for="group">Loại sản phẩm</label>
                  <select name="group_id" class="form-control">

                    <option value="" selected  disabled>Chọn loại sản phẩm</option>
                    @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{$group->id == $product->group->id ? "selected":""}}>{{ $group->group }}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-6 form-group">
                  <label for="brand">Thương hiệu</label>
                  <select name="brand_id" class="form-control">

                    <option value="" selected  disabled>Chọn thương hiệu</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{$brand->id == $product->brand->id ? "selected":""}}>{{ $brand->brand }}</option>
                    @endforeach

                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6 form-group">
                  <label for="quantity">Số Lượng</label>
                  <input type="text"  class="form-control" name="quantity" placeholder="Nhập số lượng ... " required value="{{ old('quantity') ?? $product->quantity}}" autocomplete="off">
                  @error('quantity')
                      
                          <strong class="text-danger">*{{ $message }}</strong>
                     
                  @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="detail">Mô tả sản phẩm</label>
                    <textarea name="description" cols="50"
                    rows="4" placeholder="Nhập mô tả sản phẩm" class="form-control"></textarea>
                  </div>
              </div>

              <div class="row">
                <div class="col-6 form-group">
                  <label for="image">Hình ảnh</label>
                  <input type="file" name="image[]"  class="" value="{{ $product->images[0]->image}}" multiple>
                  @error('image')
                  <strong class="text-danger">*{{ $message }}</strong>
                  @enderror
                </div>
                <div class="col-6">
                    <img src="{{ asset('/uploads/'.$product->images[0]->image) }}" height=150 weight=50 class="p-2" alt="">
                </div>
              </div>

              <div class="row">
                <div class="col text-center">
                  <button type="submit" class="btn btn-lg btn-primary">Lưu</button>
                </div>
              </div>
              
            </form>
          </div>
       </div>
   </div>
@endsection