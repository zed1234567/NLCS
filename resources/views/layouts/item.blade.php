@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col d-flex">
            <h2 class="text-uppercase">{{$product->name}}</h2>
           
        </div>
    </div>
    <div class="row">
        
        <!-- CỘT HÌNH ẢNH-->
        <div class="col-md-6 col-lg-4 col-sm-12">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($product->images as $key=>$image)
                        <li data-target="#carouselId" data-slide-to="{{$key}}" class="{{ $key ==0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($product->images as $key=>$image)
                    <div class="carousel-item {{ $key ==0 ? 'active' : '' }}">
                        <div class="inner">
                            <img src="{{ asset('/uploads/'.$image['image']) }}" alt="slide {{$key}}" class="myImg img-fluid mx-auto d-block" >
                        </div>
                        
                    </div>
                    <div class="myModalImg" id="myModalImg">
                        
                        <span class="closeM" id="closeM">&times;</span>
                        <img src="{{ asset('/uploads/'.$image['image']) }}" id="img" class="modalContent">
                       
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon text-danger" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            
            
        </div>
        <!-- ------------ -->

        <!-- CỘT THÔNG TIN VÀ BUTTON MUA HÀNG -->
        <div class="col-md-6 col-lg-4 col-sm-12">
            <div class="d-flex align-items-center justify-content-between">
          
                <h2>{{number_format($product->price)}}
                    <span style="font-size: 20px">VND</span>
                </h2>
                @if($product->quantity == 0)
                    <h4 class="badge badge-pill badge-danger">Tạm hết hàng</h4>
                @endif
            </div>
            <div>
                <p class="border font-weight-bold" style="font-size: 0.8rem;"><i class="fas fa-shipping-fast mr-2 ml-2"></i>GIAO HÀNH NHANH TRONG 1 GIỜ 63 TỈNH THÀNH</p>
                <div class="border">
                    <p style="background-color: #1abc9c; color: white" class="font-weight-bold">Khuyến mãi đặc biệt (SL có hạn)</p>
                    <ul style="list-style-type: square;" class="ml-4">
                        <li>Thu cũ đổi mới tiết kiệm đến 14 triệu. <a href="#">Xem chi tiết</a>  </li>
                        <li>Tặng 1 chai gel rửa tay khô 120 ml trị giá 59,000đ</li>
                        <li>Trả góp 0%</li>
                    </ul>
                </div>

                <!-- FROM MUA HÀNG -->
                <form action="{{ route('cart.add',$product->id) }}" method="get">
                    <div class="row mt-3">
                        <div class="col-6">
                            <a class="btn btn-outline-dark font-weight-bold  btn-block" data-toggle="modal" data-target="#modelId" >CẤU HÌNH</a>
                            
                            <!-- Modal -->
                            <div class="modal fade mt-5" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">THÔNG SỐ KỸ THUẬT</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <img src="{{ asset('/uploads/'.$product->images[0]->image) }}" height=300 weight=300>
                                                
                                                </div>
                                                @foreach($descriptions as $key => $description)
                                                <div class="col-6">
                                                    <p>{{$key.': '. $description }}</p>
                                                </div>
                                                @endforeach
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline-danger font-weight-bold  btn-block" {{ $product->quantity == 0 ? "disabled" : ""}} >MUA NGAY</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-outline-primary mt-2 font-weight-bold btn-block" >TRẢ GÓP 0%</a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-outline-primary mt-2 font-weight-bold btn-block" >TRẢ GÓP QUA THẺ</a>
                        </div>
                    </div>
                    
                </form>
                <!-- ------------- -->
                <div class="row">
                    <div class="col">
                        <p class="text-center mt-2">Gọi <span style="color:red">1800-6601</span> để được tư vấn mua hàng (Miễn phí)</p>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- ------------------ -->

        <!-- CỘT THÔNG TIN TRONG HỌP CÓ GÌ ... -->
        <div class="col-md-12 col-lg-4 col-sm text-center">
            <p class="font-weight-bold">Trong hộp có:</p>
            <p>
                <i class="fab fa-dropbox mr-2"></i>Máy, Cáp, Sạc, Tai Nghe, Đệm tai dự phòng, <br>Ốp Lưng, Sách hướng dẫn sử dụng, Cây lấy sim
            </p>
            <p class="font-weight-bold">Canvas cam kết:</p>
            <ul class="list-unstyled" style="font-size: 1rem">
                <li><i class="fas fa-medal mr-2"></i>Hàng chính hãng</li>
                <li><i class="far fa-check-circle mr-2"></i>Bảo hành 12 Tháng chính hãng</li>
                <li><i class="fas fa-shipping-fast mr-2"></i>Giao hàng miễn phí toàn quốc trong 60 phút</li>
                <li><i class="fas fa-map-marker-alt mr-2"></i>Bảo hành nhanh tại Canvas Shop trên toàn quốc</li>
            </ul>
        </div>
        <!-- -------------------- -->
    </div>
    
    <div class="row pt-3">
           <div class="col">
                <div class="fancy-title title-border">
                    <h4>SẢN PHẨM TƯƠNG TỰ</h4>
                </div>
           </div>
        </div>
    <div class="row mt-2">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-6 mt-3">
            <div class="product w-55">
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
        <img src="{{asset('/img/qc-1.png')}}" alt="img" class="mt-2 w-100">
    </div>
    
</div>
<script>
    var modal = document.getElementById("myModalImg");
    var img = document.getElementsByClassName("myImg");
    var modalImg = document.getElementById("img");
    for(var i =0; i<img.length;i++){
        img[i].onclick = function() {
            modal.style.display = "block";
            modalImg.src=this.src;
        }
    }
   
    var close = document.getElementsByClassName("closeM")[0];
    
    close.onclick = function() {
        modal.style.display = "none";
    }
    
    
</script>
@endsection