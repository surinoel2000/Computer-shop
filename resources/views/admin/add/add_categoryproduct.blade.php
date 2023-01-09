@extends('admin.layouts.index')
@section('content')
<div class="col-md-9 col-sm-9 " style="margin: auto;">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Form <small>Thêm danh mục sản phẩm</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="demo-form2" role="form" action="{{url('admin/category-Product/save-category-Product')}}"
                method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ma-danh-muc">Mã danh mục <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="ma-danh-muc" name="category_code" required="required"
                            class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ten-danh-muc">Tên danh mục <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="ten-danh-muc" name="category_name" required="required"
                            class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="mo-ta-danh-muc">Mô tả danh mục
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea class="form-control" name="description" rows="3" placeholder=""></textarea>
                    </div>

                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ma-danh-muc">Trạng thái <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select name="category_status" class="form-control input-sm m-bot15">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="hinh-anh">Hình ảnh<span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="file" name="thumbnail_url" id="exampleInputFile">
                        <p class="help-block">Example block-level help text here.</p>
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
            window.location.href = "{{URL('admin/listing/categoryProduct')}}"
            document.getElementById("demo").innerHTML =
                "Bạn muốn tiếp tục";
        } else {
            document.getElementById("demo").innerHTML =
                "Bạn không muốn tiếp tục";
        }
    }
</script>

@endsection
