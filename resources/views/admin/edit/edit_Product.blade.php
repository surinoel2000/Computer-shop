@extends('admin.layouts.index')
@section('content')
<div class="col-md-9 col-sm-9 " style="margin: auto;">
    <div class="x_panel">
        <div class="x_title">
            <h2>Up Form <small>Cập nhật sản phẩm</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php
				foreach($edit_Product as $edit_value){
			?>
            <br>
            <form id="demo-form2" role="form"
                action="{{url('admin/Product/update-Product/'.$edit_value->product_code)}}" method="post"
                data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""
                enctype="multipart/form-data">
                @csrf
                <?php
				$massage = Session::get('massage');
				if($massage){
					echo '<span style="color:green;">',$massage,'</span>';
					Session::put('massage',null);
				}
			?>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Tên sản phẩm</label>
                    <div class="col-md-9 col-sm-6 ">
                        <input style="resize: none" rows="2" name="name_product" class="form-control"
                            id="exampleInputPassword1" value="{{$edit_value->name_product}}" placeholder=""></input>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Tên hãng</label>
                    <div class="col-md-9 col-sm-6 ">
                        <select name="brand_code" class="form-control input-sm m-bot15">
                            @foreach($brands as $brand)
                            <option value="{{$brand->brand_code}}" {{($brand->brand_code) == "$edit_value->brand_code" ?
                                "selected" : '' }}>{{$brand->name_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Danh mục</label>
                    <div class="col-md-9 col-sm-6 ">
                        <select name="category_code" class="form-control input-sm m-bot15">
                            @foreach($category_Product as $cate)
                            <option value="{{$cate->category_code}}" {{($cate->category_code) ==
                                "$edit_value->category_code" ? "selected" : '' }}>{{$cate->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Giá tiền</label>
                    <div class="col-md-9 col-sm-6 ">
                        <input style="resize: none" rows="2" name="price" class="form-control"
                            value="{{$edit_value->price}}" id="exampleInputPassword1" placeholder=""></input>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Mô tả sản sản phẩm</label>
                    <div class="col-md-9 col-sm-6 ">
                        <textarea style="resize: none" rows="2" name="description" class="form-control"
                            id="exampleInputPassword1" value="{{$edit_value->description}}" placeholder="">{{$edit_value->description}}</textarea>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-3 label-align">Trạng thái<span
                            class="required">*</span></label>
                    <div class="col-md-9 col-sm-6 ">
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="1" {{($edit_value->product_status) == "1" ? "selected" : '' }}>Hiển thị
                            </option>
                            <option value="0" {{($edit_value->product_status) == "0" ? "selected" : '' }}>Ẩn</option>

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
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                        <script>
                            // Get a reference to our file input
                            const fileInput = document.querySelector('input[type="file"]');

                            // Create a new File object
                            const myFile = new File(['Hello World!'], '{{$edit_value->thumbnail_url}}', {
                                type: 'text/plain',
                                lastModified: new Date(),
                            });

                            // Now let's create a FileList
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(myFile);
                            fileInput.files = dataTransfer.files;

                            // Help Safari out
                            if (fileInput.webkitEntries.length) {
                                fileInput.dataset.file = `${dataTransfer.files[0].name}`;
                            }

                        </script>
                        <img height="200" id="image" onerror="this.src='/admin_images/no-avatar.png'"
                            src="/uploads/product_imgs/{{$edit_value->thumbnail_url}}" />
                    </div>
                </div>
                <?php
				}
			?>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-9 col-sm-9 offset-md-4">
                        <button class="btn btn-primary" type="button" onclick="abc()">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" name="edit_Product" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@endsection('Admin_content')
