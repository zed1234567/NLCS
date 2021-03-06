@extends('layouts.app')

@section('content')
<div class="container mt-3">

    @if(session('cart'))
        <?php $total=0; ?>
        <div class="row">
            <div class="col">
                <h4 class="text-center mb-3">Shopping Cart</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table text-center cart-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $product)
                           <?php $total+= ($product['price']*$product['quantity']) ?>
                        <tr>
                            <td> <a href="{{ route('product.show',$id)}}"><img src="{{ asset('/uploads/'.$product['img']) }}" height="100" width="100" alt=""></a></td>
                            <td>{{$product['name']}}</td>
                            <td>{{ number_format($product['price'])}}₫</td>
                            <td class="d-flex justify-content-center ">    
                                <!-- <input type="button" value="-" class="mr-2 minus"> -->
                                <input type="number" min="1" data-id="{{$id}}" name="quantity" class="text-center number" value="{{$product['quantity']}}" width="28">
                                <!-- <input type="button" value="+" class="ml-2 plus"> -->
                            </td>
                            <td>{{number_format($product['price']*$product['quantity'])}}₫</td>
                            <th><button class="btn btn-outline-danger remove" data-id="{{$id}}"><i class="far fa-trash-alt"></i></button></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-sm-12">
                <h4 class="text-center mb-3">Cart Total</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Cart Subtotal</td>
                            <td>{{ number_format($total) }}₫</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{ number_format($total) }}₫</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-sm-12">
                <h4 class="text-center mb-3">Customer Information</h4>
                <form action="{{ route('invoice.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="isCustomerExit" id="isCustomerExit" value="0">
                    <div class="row">

                        <div class="col">
                            
                            <input type="text" name="customer_phone" id="customer_phone" placeholder="Enter your phone.." value="{{ old('customer_phone') }}" class="form-control" autocomplete="off" required>
                            @error('customer_phone')
                            <strong class="text-danger">*{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col form-group">
                         
                            <input type="text" name="customer_name" id="customer_name" placeholder="Enter your name.." value="{{ old('customer_name') }}" class="form-control" autocomplete="off" required>
                            @error('customer_name')
                            <strong class="text-danger">*{{ $message }}</strong>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row mb-2">
                       <div class="col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="address" id="atShop"  value="1">Nhận tại cửa hàng
                                </label>
                            </div>
                       </div>
                       <div class="col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="address" value="2" id="atHome" checked>Giao tận nơi
                                </label>
                            </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <input type="text" name="customer_address" value="{{ old('customer_address') }}" id="address" placeholder="Enter your address.." class="form-control" autocomplete="off">
                            @error('customer_address')
                            <strong class="text-danger">*{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mt-1">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success">Checkout</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>

    @elseif(session('idInvoice'))
        <div class="d-flex flex-colum justify-content-center align-items-center search">
            <div class="text-center">
               <h5 class="font-weight-bold">Cảm ơn bạn đã mua hàng từ chúng tôi, mã đơn hàng của bạn là <span  class="text-success">{{ session('idInvoice')}}</span> </h5>
            </div>
        </div>
    @else
        <div class="d-flex flex-colum justify-content-center align-items-center search">
            <div class="text-center">
                <img src="{{ asset('/img/cart.png') }}" alt="noti">
                <h5 class="font-weight-bold">Không có sản phẩm nào, mời bạn tiếp tục mua sắm!</h5>
                <a href="{{ route('index') }}" class="btn btn-outline-success">Quay lại trang chủ</a>
            </div>
        </div>
    @endif
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('input[type="radio"]').click(function () {
            if ($(this).attr("value") == "1") {
                $("#address").hide();
            }
            if ($(this).attr("value") == "2") {
                $("#address").show();

            }
        });

        $(".remove").click(function(e){
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure?")){
                $.ajax({
                    url:"{{ route('cart.remove') }}",
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function(response){
                        window.location.reload();
                    }
                });
            }
        });

        $("input[name='quantity']").change(function(e){
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: "{{ route('cart.update') }}",
                method: "PATCH",
                data: {_token: '{{ csrf_token() }}',id: ele.attr("data-id"),quantity: ele.val()},
                success: function(response){
                    window.location.reload();
                }
            });
            
        });

        var typingTimer;
        var doneTyping = 1500;
        $("input[name='customer_phone']").keyup(function(){
            clearTimeout(typingTimer);
            if($("input[name='customer_phone']").val()){
                typingTimer = setTimeout(checkInfoCustomer,doneTyping);
            }
        });

        function checkInfoCustomer(){
           $.ajax({
               url: "{{ route('customer.info') }}",
               method: "POST",
               data: {_token: '{{ csrf_token() }}', phone: $("input[name='customer_phone']").val()},
               success: function(data){
                    updateInfoCustomer(data);
               },
               error: function (request, status, error) {
                    alert(request.responseText);
                }
               
           });
        }

        function updateInfoCustomer(data){
            if(data != 0){
                $('#customer_name').val(data[0].customer_name);
                if(data[0].customer_address == "Tại cửa hàng."){
                    $('#atHome').attr("checked",false);
                    $('#atShop').click();
                }else{
                    $('#atHome').attr("checked",true);
                    $('#atHome').click();
                    $('#address').val(data[0].customer_address);
                }
               $('#isCustomerExit').val(1);
            }
        }
    });
</script>
@endsection