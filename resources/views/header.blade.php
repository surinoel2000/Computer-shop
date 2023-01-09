<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +084-35</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> buinhatmi@gmail.com</li>
                <li><a href="#"><i class="fa fa-map-marker"></i>Tố Hữu, quận Hải Châu</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-envelope"></i>Phản hồi</a></li>

                @guest
                @if (Route::has('login'))
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-o"></i>{{ __('Tài khoản')
                        }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-o"></i>
                        {{ Auth::user()->name }}
                    </a>



                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('fe.user_profile',['id'=>Auth::user()->id]) }}">
                            {{ __('Profile') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Đăng xuất') }}
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ URL::to('/home') }}" class="logo">
                            <img src="{{ asset('assetss/img/logostore.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-5">
                    <div class="header-search">
                        <form action="/search" method="GET">
                            <select class="input-select" name="ALL">
                                <option value="">Tất cả</option>
                            </select>
                            <input type="text" class="input" name="query" placeholder="Nhập tên sản phẩm" value="">
                            <button class="search-btn" value="" method="GET">Tìm</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-4 clearfix">
                    <div class="header-ctn">

                        <!-- Lich su don hang-->
                        @if (Auth::user())
                        <div class="dropdown">
                            <a class="" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-history" id="cursorr"
                                    onclick="window.location.href='{{ URL::to('/history-order') }}'"></i>
                                <span>Lịch sử</span>
                            </a>
                        </div>
                        @else
                        <div class="dropdown">
                            <a class="" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-search" id="cursorr"
                                    onclick="window.location.href='{{ URL::to('/search-history-order') }}'"></i>
                                <span>Tra cứu</span>
                            </a>
                        </div>
                        @endif


                        <!-- Cart -->
                        <div class="dropdown">

                            <a class="newsletter-follow" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart" id="cursorr"></i>
                                <span>Giỏ hàng</span>
                                <?php if(Session::has("Cart") != null){ ?>
                                <div class="qty">{{ Session::get("Cart")->totalQuantity }}</div>
                                <?php }
                                else {?>
                                <div class="qty">0</div>
                                <?php } ?>
                            </a>
                            <?php
                                     if(Session::has("Cart") != 0){
                                        ?>
                            <div class="cart-dropdown">

                                <div class="cart-list">
                                    <?php foreach(Session::get("Cart")->products as $product){ ?>
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('uploads/product_imgs/'.$product['productInfo']->thumbnail_url)}}"
                                                alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a
                                                    href="{{ URL::to('product-detail/'.$product['productInfo']->product_code) }}">{{
                                                    $product['productInfo']->name_product }}</a></h3>
                                            <h4 class="product-price">
                                                <span class="qty">{{$product['quantity']}} x </span>
                                                {{number_format($product['productInfo']->price, 0, ',', ',')}}
                                            </h4>
                                        </div>
                                        <button class="delete"
                                            onclick="window.location.href='{{ URL::to('/delete-item-list-cart/'.$product['productInfo']->product_code) }}'"><i
                                                class="fa fa-close"></i></button>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="cart-summary">
                                    <small>{{ Session::get("Cart")->totalQuantity }} x Sản phẩm</small>
                                    <h5>Tổng: {{number_format(Session::get("Cart")->totalPrice, 0, ',', ',')}}</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{ URL::to('/list-cart') }}">Xem giỏ</a>
                                    <a href="{{ route('cart.checkout') }}">Thanh toán <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>

                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
