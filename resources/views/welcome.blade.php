@extends('layouts.app')

@section('content')
<div class="section">

    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="assetss/img/salesbannerr.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>HOT<br></h3>
                        <a href="#hot" class="cta-btn">Xem ngay <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="assetss/img/newproductbanner.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>NEWS<br></h3>
                        <a href="#new" class="cta-btn">Xem ngay <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="assetss/img/shopbanner.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>SHOP<br></h3>
                        <a href="{{ route('home.shop') }}" class="cta-btn">Xem ngay <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div id="new" class="section-title">
                    <h3 class="title">SẢN PHẨM MỚI</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php
                             foreach($category_products as $value){ ?>
                            <li><a data-toggle="tab" href="#tab1">{{ $value->category_name }}</a></li>
                            <?php }
                            ?>
                            {{-- <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li> --}}

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                    foreach($products as $value){ ?>
                                <!-- product -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <a href="{{ URL::to('product-detail/'.$value->product_code) }}">
                                            <div class="product-img product-label">
                                                <img src="uploads/product_imgs/{{$value->thumbnail_url}}" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">MỚI</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $value->category_name }}</p>
                                                <h3 class="product-name"><a href="#">{{ $value->name_product }}</a></h3>
                                                <h4 class="product-price">{{number_format($value->price, 0, ',', ',') }}
                                                    đ<del class="product-old-price"><br>$990,000 đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">Thích</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">...</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart"
                                            onclick="window.location.href='{{ URL::to('Add-cart/'.$value->product_code) }}'">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                    THÊM VÀO GIỎ</button>
                                            </div>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php }
                                        ?>
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>

        <!-- /row -->
    </div>

    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div id="hot" class="section-title">
                    <h3 class="title">HOT</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php
                             foreach($category_products as $value){ ?>
                            <li><a data-toggle="tab" href="#tab1">{{ $value->category_name }}</a></li>
                            <?php }
                            ?>
                            {{-- <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li> --}}

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                    foreach($products as $value){ ?>
                                <!-- product -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <a href="{{ URL::to('product-detail/'.$value->product_code) }}">
                                            <div class="product-img product-label">
                                                <img src="uploads/product_imgs/{{$value->thumbnail_url}}" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $value->category_name }}</p>
                                                <h3 class="product-name"><a href="#">{{ $value->name_product }}</a></h3>
                                                <h4 class="product-price">{{number_format($value->price, 0, ',', ',') }}
                                                    đ<del class="product-old-price"><br>$990,000 đ</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">Thích</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">...</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart"
                                            onclick="window.location.href='{{ URL::to('Add-cart/'.$value->product_code) }}'">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                    THÊM VÀO GIỎ</button>
                                            </div>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php }
                                        ?>
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>

        <!-- /row -->
    </div>

    <!-- /container -->
</div>
@endsection
