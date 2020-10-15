@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <h2 class="text-uppercase ml-5">{{$product->name}}</h2>
        </div>
    </div>
    <div class="row">

        <!-- CỘT HÌNH ẢNH-->
        <div class="col-md-6 col-lg-4 col-sm-12">

            <div class="inner">
                <img src="{{ asset('/uploads/'.$product->images[0]->image) }}" 
                        class="img-fluid mx-auto d-block" 
                        style="width: 400px;max-height: 400px;" 
                        id="myImg">
            </div>
            
            <div class="myModalImg" id="myModalImg">
                <span class="closeM" id="closeM">&times;</span>
                <img src="{{ asset('/uploads/'.$product->images[0]->image)  }}" 
                        id="img" class="modalContent">
            </div>
            
        </div>
        <!-- ------------ -->

        <!-- CỘT THÔNG TIN VÀ BUTTON MUA HÀNG -->
        <div class="col-md-6 col-lg-4 col-sm-12">
            <h2>{{number_format($product->price)}}
                <span style="font-size: 20px">VND</span>
            </h2>
            <div>
                <p class="border font-weight-bold" style="font-size: 1rem;"><i class="fas fa-shipping-fast mr-2 ml-2"></i>GIAO HÀNH NHANH TRONG 1 GIỜ 63 TỈNH THÀNH</p>
                <div class="border">
                    <p style="background-color: #34a105; color: white" class="font-weight-bold">Khuyến mãi đặc biệt (SL có hạn)</p>
                    <ul style="list-style-type: square;" class="ml-4">
                        <li>Thu cũ đổi mới tiết kiệm đến 14 triệu. <a href="#">Xem chi tiết</a>  </li>
                        <li>Tặng 1 chai gel rửa tay khô 120 ml trị giá 59,000đ</li>
                        <li>Trả góp 0%</li>
                    </ul>
                </div>

                <!-- FROM MUA HÀNG -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="code" value="">
                            <button type="submit" class="btn btn-danger font-weight-bold mt-5 btn-block" styles="">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-primary mt-2 font-weight-bold" style="width: 100%">TRẢ GÓP 0%</a></button>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-primary mt-2 font-weight-bold" style="width: 100%">TRẢ GÓP QUA THẺ</a>
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
</div>
<script>
    var modal = document.getElementById("myModalImg");
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src=this.src;
    }

    var close = document.getElementById("closeM");
    close.onclick = function() {
        modal.style.display = "none";
    }
</script>
@endsection