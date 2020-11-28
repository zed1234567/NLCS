@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{ asset('/img/laptop-1.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/img/laptop-2.png') }}"  alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/img/laptop-3.png') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-4 carousel-responsive">
            <div class="row">
                <div class="col mb-2">
                    <img src="{{ asset('/img/laptop-4.png') }}" class="w-100" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col mt-1">
                
                <img src="{{ asset('/img/laptop-5.png') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
   
        <div class="row pt-3">
           <div class="col">
                <div class="fancy-title title-border">
                    <h4>POPULAR BRANDS</h4>
                </div>
           </div>
        </div>
        <div class="row">
            <div class="col table-responsive">
                <table class="table table-borderless table-responsive-lg text-center">
                   
                        <tbody class="p-5 img-popular">
                            <tr>
                                <td><img src="{{ asset('img/dell.jpg') }}" alt="iPhone"></td>
                                <td><img src="{{ asset('img/acer.jpg') }}" alt="samsung"></td>
                                <td><img src="{{ asset('img/Asus.jpg') }}" alt="OPPO"></td>
                                <td><img src="{{ asset('img/lenovo.jpg') }}" alt="iPhone"></td>
                                <td><img src="{{ asset('img/macbook.png') }}" alt="iPhone"></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    
    <div class="row mt-3">
        <div class="col">
            <div class="d-flex justify-content-between responsive-filler">
                <h4 class="font-weight-bold">{{$name}}</h4>

                <div class="form-group">
                    <div class="d-flex">
                        <input type="hidden" value="{{$id}}" id="type">
                        <button type="reset" class="mr-2 btn btn-outline-danger" onclick="window.location.reload()">Xóa</button>
                        <select class="custom-select mr-2" name="brand" id="brandFilter">
                            <option disabled selected>Thương Hiệu</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{ $brand->brand }}</option>
                            @endforeach
                        </select>
                        <select class="custom-select mr-2" name="price" id="priceFilter">
                            <option disabled selected>Mức Giá</option>
                            <option value="1">Dưới 5 triệu</option>
                            <option value="2">Từ 5 - 15 triệu</option>
                            <option value="3">Từ 15 - 25 triệu</option>
                            <option value="4">Trên 25 triệu</option>
                        </select>
                        <select class="custom-select" name="sort" id="sortFilter">
                            <option disabled selected>Sắp xếp</option>
                            <option value="ASC">Tăng dần</option>
                            <option value="DESC">Giảm dần</option>
                        </select>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <div class="row" id="filter">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-6 mt-3">
            <div class="product w-55 mt-1">
                <div class="product-img">
                    <a href="{{ route('product.show',$product->id)}}"><img src="{{ asset('/uploads/'.$product->images[0]->image) }}" alt=""></a>
                    <!-- <a href="" class="change-img"><img src="{{ asset('img/2-2.jpg') }}" class="img-on" alt=""><img src="{{ asset('img/1-1.jpg') }}"  class="img-off" alt=""></a> -->
                    <div class="product-overlay">
                        <a href="{{ route('cart.add',$product->id) }}" class="add-to-cart"><i class="fas fa-cart-plus"></i><span> Add to Cart</span></a>
                        <a href="{{ route('product.show',$product->id)}}" class="item-quick-view"><i class="fas fa-search-plus"></i><span> Quick View</span></a>
                    </div>
                    <div class="product-discount">
                        <p>Trả góp 0%</p>
                    </div>
                </div>
                <div class="product-desc">
                    <div class="product-title"><a href="">{{ $product->name }}</a></div>
                    <div class="product-price">{{ number_format($product->price) }}₫</div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12 mt-3">
            <div class="row d-flex justify-content-center">
            {{ $products->links()}}         
            </div>
       
        </div>
        
    </div>
</div> 
<script type="text/javascript">
    $(document).ready(function(){
        $("select").change(function(e){
            e.preventDefault();
            var brand = $("#brandFilter").val();
            var type = $('#type').val();
            var price = $('#priceFilter').val();
            var sort = $("#sortFilter").val();
            $.ajax({
                url:"{{ route('filter') }}",
                method: "GET",
                data: {_token: '{{ csrf_token() }}', brand: brand, type: type, price: price, sort: sort},
                success: function(product){
                    $('#filter').html(product);
                }
            });
            
        });

       
       
    });
</script>
@endsection