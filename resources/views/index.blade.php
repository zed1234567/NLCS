@extends('layouts.app')

@section('content')
    <div class="container mb-3">

        <!-- Carouse -->
        <div class="row">
            <div class="col-8">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/800-300-800x300-5.png')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Title</h3>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img  src="{{ asset('img/Normal-Note20-800-300-800x300.png')}}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Title</h3>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img  src="{{ asset('img/reno4-chung-800-300-800x300-1.png')}}" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Title</h3>
                                <p>Description</p>
                            </div>
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
            <div class="col-4">
                <div class="row">
                    <img src="{{ asset('img/iPhoneDOCQUYEN-398-110-398x110.png')}}" class="w-100 " alt="">
                </div>
                <div class="row">
                    <img src="{{ asset('img/Sam-samsung-398-110-398x110.png')}}" class="w-100 mt-2" alt="">
                </div>
                <div class="row">
                    <img src="{{ asset('img/A31-11-390-80-390x80-4.png')}}" class="w-100 mt-2" alt="">
                </div>
            </div>
        </div>
    </div>
        <!-- End-Carousel -->
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6">
                <div class="product w-55">
                    <div class="product-img">
                        <a href="{{ route('product.show',$product->id)}}"><img src="{{ asset('/uploads/'.$product->images[0]->image) }}" alt=""></a>
                        <!-- <a href="" class="change-img"><img src="{{ asset('img/2-2.jpg') }}" class="img-on" alt=""><img src="{{ asset('img/1-1.jpg') }}"  class="img-off" alt=""></a> -->
                        <div class="product-overlay">
                            <a href="{{ route('cart.add',$product->id) }}" class="add-to-cart"><i class="fas fa-cart-plus"></i><span> Add to Cart</span></a>
							<a href="#" class="item-quick-view"><i class="fas fa-search-plus"></i><span> Quick View</span></a>
                        </div>
                    </div>
                    <div class="product-desc">
                        <div class="product-title"><a href="">{{ $product->name }}</a></div>
                        <div class="product-price">{{ number_format($product->price) }}</div>
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
    </div> 
    <div class="container">
        <div class="row pt-lg-5">
           <div class="col">
                <div class="fancy-title title-border">
                    <h4>Popular Brands</h4>
                </div>
           </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-borderless text-center">
                   
                        <tbody class="p-5">
                            <tr>
                                <td><img src="{{ asset('img/iPhone.jpg') }}" alt="iPhone" class="img-brands"></td>
                                <td><img src="{{ asset('img/Samsung.jpg') }}" alt="samsung" class="img-brands"></td>
                                <td><img src="{{ asset('img/OPPO.png') }}" alt="OPPO" class="img-brands"></td>
                                <td><img src="{{ asset('img/iPhone.jpg') }}" alt="iPhone" class="img-brands"></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('img/iPhone.jpg') }}" alt="iPhone" class="img-brands"></td>
                                <td><img src="{{ asset('img/Samsung.jpg') }}" alt="samsung" class="img-brands"></td>
                                <td><img src="{{ asset('img/OPPO.png') }}" alt="OPPO" class="img-brands"></td>
                                <td><img src="{{ asset('img/iPhone.jpg') }}" alt="iPhone" class="img-brands"></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h5><i class="far fa-thumbs-up mr-3"></i>100% ORIGINAL</h5>
                <p>We guarantee you the sale of Original Brands.</p>
            </div>
            <div class="col-3">
                <h5><i class="far fa-credit-card mr-3"></i>PAYMENT OPTIONS</h5>
                <p>We accept Visa, MasterCard and American Express.</p>
            </div>
            <div class="col-3">
                <h5><i class="fas fa-truck mr-3"></i>FREE SHIPPING</h5>
                <p>Free Delivery to 100+ Locations on orders above $40.</p>
            </div>
            <div class="col-3">
                <h5><i class="fas fa-retweet mr-3"></i>30-DAYS RETURNS</h5>
                <p>Return or exchange items purchased within 30 days.</p>
            </div>
        </div>
        
    </div>
    <div id="scrollOnTop" onclick="onTop()" ><i class="fas fa-chevron-up"></i></div>
@endsection