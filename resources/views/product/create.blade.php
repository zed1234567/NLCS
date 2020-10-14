@extends('admin.index')

@section('content')
   <div class="container-fluid mt-lg-5">
       <div class="row shadow py-5">
          <div class="col">
            <h3 class="text-center mb-5">Thêm sản phẩm mới.</h3>
            <form action="" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-6 form-group">
                  <label for="name">Tên sản phẩm</label>
                  <input type="text"  class="form-control" name="name" placeholder="Nhập tên sản phẩm ... " required autocomplete="off">
                </div>

                <div class="col-6 form-group">
                  <label for="price">Giá sản phẩm</label>
                  <input type="text"  class="form-control" name="price" placeholder="Nhập giá sản phẩm ..." required autocomplete="off">
                </div>
              </div>

              <div class="row">
                <div class="col-6 form-group">
                  <label for="group">Loại sản phẩm</label>
                  <select name="group" class="form-control">

                    <option value="0" default disabled>Chọn loại sản phẩm</option>
                    @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="col-6 form-group">
                  <label for="brand">Thương hiệu</label>
                  <select name="group" class="form-control">

                    <option value="0" default disabled>Chọn thương hiệu</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand}}</option>
                    @endforeach

                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6 form-group">
                  <label for="quantity">Số Lượng</label>
                  <input type="text"  class="form-control" name="quantity" placeholder="Nhập số lượng ... " required autocomplete="off">
                </div>
                <div class="col-6 form-group">
                    <label for="detail">Mô tả sản phẩm</label>
                    <textarea name="detail" cols="50"
                    rows="4" placeholder="Nhập mô tả sản phẩm" class="form-control"></textarea>
                  </div>
              </div>

              <div class="row">
                <div class="col form-group">
                  <label for="image">Hình ảnh</label>
                  <input type="file" name="image[]"  class="form-control-file border" multiple>
                </div>
              </div>

              <div class="row">
                <div class="col text-center">
                  <button type="submit" class="btn btn-lg btn-primary">Thêm</button>
                </div>
              </div>
              
            </form>
          </div>
       </div>
   </div>
@endsection