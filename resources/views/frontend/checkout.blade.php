@extends('layouts.app')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <form method="POST" action="{{URL::to('/order-place')}}" name="checkout_form" enctype="multipart/form-data"
            novalidate="novalidate">
            @csrf
            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">ĐỊA CHỈ ĐẶT HÀNG</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Tên <span style="color: red">*</span></label>
                            <input class="input" id="name" type="text" name="name" placeholder="Họ tên"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email <span style="color: red">*</span></label>
                            <input class="input" type="email" id="imail" name="email" placeholder="Email"
                                value="{{ Auth::user()->email }}" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ giao hàng <span style="color: red">*</span></label>
                            <input class="input" type="text" id="address" name="address" placeholder="Địa chỉ"
                                value="{{ Auth::user()->diachi }}" required />
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại <span style="color: red">*</span></label>
                            <input class="input" type="tel" id="tel" name="tel" placeholder="Số điện thoại"
                                value="{{ Auth::user()->phone_num }}"  required />
                        </div>
                        <label for="">Lưu ý: </label><span style="font-size: small"> Những phần có dấu <span
                                style="color: red">*</span> không được bỏ trống</span>

                    </div>
                    <!-- /Billing Details -->



                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea class="input" name="note" placeholder="Ghi chú" required></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->

                <div class="col-md-5 order-details">

                    <div class="section-title text-center">
                        <h3 class="title">ĐƠN HÀNG</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>Sản phẩm</strong></div>
                            <div><strong>Đơn giá</strong></div>
                        </div>
                        <?php if(Session::has("Cart") != null){
                            $num = 1;
                            $qt = 1;
                            foreach(Session::get("Cart")->products as $product){

                        ?>

                        <div class="order-products">

                            <div class="order-col">
                                <img src="{{asset('uploads/product_imgs/'.$product['productInfo']->thumbnail_url)}}"
                                    class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                <div>{{$product['productInfo']->name_product }} X {{$product['quantity']}}</div>
                                <div>{{number_format($product['productInfo']->price, 0, ',', ',')}}đ</div>
                            </div>

                        </div>
                        <?php
                            }
                        ?>
                        <div class="order-col">
                            <div>Phí ship</div>
                            <div><strong>100,000đ</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>Tổng thanh toán</strong></div>
                            <div><strong class="order-total">{{number_format(Session::get("Cart")->totalPrice+100000,0,
                                    ',', ',')}}đ</strong></div>
                        </div>
                        <?php
                        }?>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1" required>
                            <label for="payment">
                                <span></span>
                                <input class="input" id="name" type="text" name="payment_option" placeholder="Họ tên"
                                    value="Thanh toán khi nhận hàng" readonly='False' required>
                            </label>

                        </div>

                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">

                    </div>
                    <button type="submit" class="primary-btn order-submit">ĐẶT HÀNG</button>

                </div>

                <!-- /Order Details -->
            </div>
        </form>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>
    public function pay() {
        var name = document.getElementById("name").value;
        var mail = document.getElementById("email").value;
        var add = document.getElementById("address").value;
        var tel = document.getElementById("tel").value;
        if (name != null && mail != null && add != null && tel != null) {
            window.location.href = "{{ route('home.shop') }}";
        }

    }
</script>
@endsection
