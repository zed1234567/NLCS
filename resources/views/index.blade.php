@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-3">

        <!-- Carouse -->
        <div class="row">
            <div class="col">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <!-- <div class="carousel-item active">
                            <img src="{{ asset('img/2.jpg')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Title</h3>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img  src="{{ asset('img/3.jpg')}}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Title</h3>
                                <p>Description</p>
                            </div>
                        </div> -->
                        <div class="carousel-item active">
                            <img  src="{{ asset('img/4.jpg')}}" alt="Third slide">
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
        </div>
    </div>
        <!-- End-Carousel -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-img">
                        <a href="" class="change-img"><img src="{{ asset('img/2-2.jpg') }}" class="img-on" alt=""><img src="{{ asset('img/1-1.jpg') }}"  class="img-off" alt=""></a>
                        <div class="product-overlay">
                            <a href="#" class="add-to-cart"><i class="fas fa-cart-plus"></i><span> Add to Cart</span></a>
							<a href="#" class="item-quick-view"><i class="fas fa-search-plus"></i><span> Quick View</span></a>
                        </div>
                    </div>
                    <div class="product-desc">
                        <div class="product-title"><a href="">Checked Short Dress</a></div>
                        <div class="product-price">$23</div>
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
            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-img">
                        <a href="" class="change-img"><img class="img-on" src="{{ asset('img/1-1.jpg') }}" alt=""><img class="img-off" src="{{ asset('img/2-2.jpg') }}" alt=""></a>
                        <div class="product-overlay">
                            <a href="#" class="add-to-cart"><i class="fas fa-cart-plus"></i><span> Add to Cart</span></a>
							<a href="#" class="item-quick-view"><i class="fas fa-search-plus"></i><span> Quick View</span></a>
                        </div>
                    </div>
                    <div class="product-desc">
                        <div class="product-title"><a href="">Checked Short Dress</a></div>
                        <div class="product-price">$23</div>
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
            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ asset('img/2-2.jpg') }}" alt="">
                        <div class="product-overlay">
                            <a href="#" class="add-to-cart"><i class="fas fa-cart-plus"></i><span> Add to Cart</span></a>
							<a href="#" class="item-quick-view"><i class="fas fa-search-plus"></i><span> Quick View</span></a>
                        </div>
                    </div>
                    <div class="product-desc">
                        <div class="product-title"><a href="">Checked Short Dress</a></div>
                        <div class="product-price">$23</div>
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
            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ asset('img/1-1.jpg') }}" alt="">
                        <div class="product-overlay">
                            <a href="#" class="add-to-cart"><i class="fas fa-cart-plus"></i><span> Add to Cart</span></a>
							<a href="#" class="item-quick-view"><i class="fas fa-search-plus"></i><span> Quick View</span></a>
                        </div>
                    </div>
                    <div class="product-desc">
                        <div class="product-title"><a href="">Checked Short Dress</a></div>
                        <div class="product-price">$23</div>
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
        </div>
    </div> 
    <div class="container">
        <div class="row pt-lg-5">
           <div class="col-lg-4 col-sm-12">
                <div class=" fancy-title title-border">
                    <h4>About US</h4>
                </div>
                <p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
           </div>
           <div class="col-lg-4 col-sm-12">
                <div class=" fancy-title title-border">
                    <h4>About US</h4>
                </div>
                <p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
           </div>
           <div class="col-lg-4 col-sm-12">
                <div class="fancy-title title-border">
                    <h4>About US</h4>
                </div>
                <p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
           </div>
        </div>
         
    </div>
    <div id="scrollOnTop" onclick="onTop()" ><i class="fas fa-chevron-up"></i></div>
@endsection