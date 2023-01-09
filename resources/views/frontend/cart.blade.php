@extends('layouts.app')

@section('content')
<div class="section">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Giỏ hàng</h2>
        </div>
        <?php if(Session::has("Cart") != null){ ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <!-- Set columns width -->
                            <th class="text-center py-3 px-4" style="min-width: 400px;">Tên Sản Phẩm</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Đơn giá</th>
                            <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                            <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                    class="shop-tooltip float-none text-light" title=""
                                    data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 1;
                foreach(Session::get("Cart")->products as $product){?>
                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <img src="{{asset('uploads/product_imgs/'.$product['productInfo']->thumbnail_url)}}"
                                        class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                    <div class="media-bodyy">
                                        <a href="#" class="d-block text-dark">{{ $product['productInfo']->name_product
                                            }} x {{$product['quantity']}}</a>
                                        <small>
                                            <span class="text-muted">Mã sản phẩm: </span>{{
                                                $product['productInfo']->product_code}} </span>&nbsp;
                                            <span class="text-muted">Mã hãng: </span>{{
                                            $product['productInfo']->brand_code}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">
                                {{number_format($product['productInfo']->price, 0, ',', ',')}}đ</td>
                            <td class="align-middle p-4"><input type="text" id="{{$num}}" name="quantity" size="4"
                                onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                maxlength="3" class="form-control text-center"
                                    value="{{$product['quantity']}}" onchange="up_size('{{$num}}')"></td>
                            <td class="text-right font-weight-semibold align-middle p-4">
                                {{number_format($product['price'], 0, ',', ',')}}đ</td>
                            <td class="text-center align-middle px-0"><a
                                    href="{{ URL::to('/delete-item-list-cart/'.$product['productInfo']->product_code) }}"
                                    class="shop-tooltip close float-none text-danger" title=""
                                    data-original-title="Remove">X</a></td>
                        </tr>
                        <?php $num++; } ?>


                    </tbody>
                </table>
            </div>
            <!-- / Shopping cart table -->

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="mt-4">
                    <label class="text-muted font-weight-normal">Mã ưu đãi</label>
                    <input type="text" placeholder="Coming Soon xD" class="form-control" disabled>
                </div>

                <div class="text-right mt-4">
                    <label class="text-muted font-weight-normal m-0">Tổng</label>
                    <div class="text-large"><strong>{{number_format(Session::get("Cart")->totalPrice, 0, ',',
                            ',')}}đ</strong></div>
                </div>
            </div>
        </div>

        <div class="float-right">
            <button type="button" onclick="window.location.href='{{ URL::to('/home') }}'" class="btn-login btn-lg btn-default md-btn-flat mt-2 mr-3">TRỞ LẠI</button>
            <button type="button" class="btn-login btn-lg btn-primary mt-2"
                onclick="window.location.href='{{ URL::to('checkout') }}'">THANH TOÁN</button>
        </div>

    </div>
</div>
<?php } ?>
</div>
<script>
    function up_size(id){

        $num1 = 1;
        var x = 1;
        // global $qty;
        var result = document.getElementById(id).value;
        $qt = parseInt(result) ;
        console.log( $qt);

        <?php foreach(Session::get("Cart")->products as $pro){ ?>
            $qt = parseInt(result) ;
            $ma = "{{$pro['productInfo']->product_code}}";
            var y = x.toString();
            // $pro['quantity'] = $qty;
            if(y == id && $qt != '0'){
                $.ajax({
                    url: 'update-quantity-item-cart/' + $ma + '/'+$qt,
                    type: "GET",
                })

                window.location.href = "{{URL::route('fe.list_cart')}}"


            }
            x = parseInt(y);
            x++;


        <?php } ?>
    }

</script>

@endsection
