@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="search">
            @if(count($products) !=0)
            <h5 class="font-weight-bold mt-4">Tìm thấy {{ count($products)}} sản phẩm phù hợp</h5>
            <div class="row  mb-4">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="product">
                        <div class="product-img">
                            <a href="{{ route('product.show',$product->id)}}" class="text-center"><img src="{{ asset('/uploads/'.$product->images[0]->image) }}" alt=""></a>
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
            </div>
            @else

                <div class="d-flex flex-colum justify-content-center align-items-center search">
                    <div class="text-center">
                        <img src="{{ asset('/img/noti-search.png') }}" alt="noti">
                        <p class="font-weight-bold">Rất tiếc chúng tôi không tìm thấy kết quả của bạn!</p>
                    </div>
                </div>
                
            @endif
        </div>
         
    </div>
@endsection