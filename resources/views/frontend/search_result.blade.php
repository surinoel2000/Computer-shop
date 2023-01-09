@extends('layouts.app')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">DANH MỤC</h3>
                        <div class="checkbox-filter">
                            <?php
                                $num = 1;
                                foreach($category_products as $value){

                                    ?>
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-{{ $num }}">
                                <label for="category-{{ $num }}">
                                    <span></span>
                                    {{ $value->category_name }}
                                    <small>
                                        <?php
                                                foreach ($quaty as $key => $qua) {
                                                    if($value->category_code == $qua->category_code){ ?>
                                        ({{ $qua->total }})
                                        <?php } }?>
                                    </small>
                                </label>
                            </div>
                            <?php $num++;}
                                ?>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">GIÁ</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Hãng</h3>
                        <div class="checkbox-filter">
                            <?php
                                $num = 1;
                                foreach($brands as $value){

                                    ?>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-{{ $num }}">
                                <label for="brand-{{ $num }}">
                                    <span></span>
                                    {{ $value->name_brand }}
                                    <small>
                                        <?php
                                                foreach ($qty_brand as $key => $qua) {
                                                    if($value->brand_code == $qua->brand_code){ ?>
                                        ({{ $qua->total }})
                                        <?php } }?>
                                    </small>
                                </label>
                            </div>
                            <?php $num++;}
                                ?>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sắp xếp theo:
                                <select class="input-select">
                                    <option value="0">Độ phổ biến</option>
                                    {{-- <option value="1">Position</option> --}}
                                </select>
                            </label>


                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            {{-- <li><a href="#"><i class="fa fa-th-list"></i></a></li> --}}
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">

                        <!-- product -->
                        <?php
                    foreach($products as $value){ ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <a href="{{ URL::to('product-detail/'.$value->product_code) }}">
                                    <div class="product-img product-label">
                                        <img src="uploads/product_imgs/{{$value->thumbnail_url}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">Mới</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $value->category_code }}</p>
                                        <h3 class="product-name"><a href="#">{{ $value->name_product }}</a></h3>
                                        <h4 class="product-price">{{number_format($value->price, 0, ',', ',') }} đ<del
                                                class="product-old-price"><br>$990,000 đ</del></h4>
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
                                    onclick="window.location.href='{{ URL::to('Add-cart/'.$value->product_code)}}'">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> THÊM VÀO
                                            GIỎ</button>
                                    </div>
                            </div>

                        </div>
                        <?php }
                    ?>
                        <!-- /product -->
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /STORE -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->s
    </div>
    <!-- SECTION --/>
@endsection
