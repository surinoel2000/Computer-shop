@extends('admin.layouts.index')
@section('content')
<div class="col-md-9 col-sm-9 " style="margin: auto;">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Form <small>Thêm sản phẩm</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="demo-form2" role="form" action="{{url('admin/Product/save-Product')}}" method="post"
                data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""
                enctype="multipart/form-data">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Mã sản phẩm</label>
                    <div class="col-md-9 col-sm-6 ">
                        <input style="resize: none" rows="2" name="product_code" class="form-control"
                            id="exampleInputPassword1" placeholder=""></input>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Tên sản phẩm</label>
                    <div class="col-md-9 col-sm-6 ">
                        <input style="resize: none" rows="2" name="name_product" class="form-control"
                            id="exampleInputPassword1" placeholder=""></input>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Tên hãng</label>
                    <div class="col-md-9 col-sm-6 ">
                        <select name="brand_code" class="form-control input-sm m-bot15">
                            @foreach($brands as $key => $brand)
                            <option value="{{$brand->brand_code}}">{{$brand->name_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Danh mục</label>
                    <div class="col-md-9 col-sm-6 ">
                        <select name="category_code" class="form-control input-sm m-bot15">
                            @foreach($categories as $key => $cate)
                            <option value="{{$cate->category_code}}">{{$cate->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Mô tả sản sản phẩm</label>
                    <div class="col-md-9 col-sm-6 ">
                        <textarea style="resize: none" rows="4" name="description" class="form-control"
                            id="exampleInputPassword1" placeholder=""></textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Giá tiền</label>
                    <div class="col-md-9 col-sm-6 ">
                        <input style="resize: none" rows="2" name="price" class="form-control"
                            id="exampleInputPassword1" placeholder=""></input>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Trạng thái<span
                            class="required">*</span></label>
                    <div class="col-md-9 col-sm-6 ">
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>

                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align" for="hinh-anh">Hình ảnh<span
                            class="required">*</span></label>
                    <div class="col-md-9 col-sm-6 ">
                        <script>
                            function chooseFile(fileIn) {
                                if (fileIn.files && fileIn.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#image').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(fileIn.files[0]);
                                }
                            }
                        </script>
                        <input type="file" name="thumbnail_url" id="exampleInputFile" onchange="chooseFile(this)"
                            required="required">
                        <p class="help-block">Example block-level help text here.</p>
                        <img height="200" id="image" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-9 col-sm-9 offset-md-4">
                        <button class="btn btn-primary" type="button" onclick="abc()">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" name="add_categoryProduct" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script>
    function abc() {
        if (confirm("Bạn có muốn quay lại trang trước") == true) {
            window.location.href = "{{URL('admin/listing/Product')}}"
            document.getElementById("demo").innerHTML =
                "Bạn muốn tiếp tục";
        } else {
            document.getElementById("demo").innerHTML =
                "Bạn không muốn tiếp tục";
        }
    }
</script>

@endsection
