@extends('admin.layouts.index')
@section('content')
<div class="col-md-9 col-sm-9 " style="margin: auto;">
    <div class="x_panel">
        <div class="x_title">
            <h2>Up Form <small>Cập nhật hãng sản phẩm</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php
				foreach($edit_brandProduct as $value){
			?>
            <br>
            <form id="demo-form2" role="form"
                action="{{url('admin/brand-Product/update-brand-Product/'.$value->brand_code)}}" method="post"
                data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                @csrf
                <?php
				$massage = Session::get('massage');
				if($massage){
					echo '<span style="color:green;">',$massage,'</span>';
					Session::put('massage',null);
				}
			?>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ten-danh-muc">Tên hãng <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="ten-hang" name="name_brand" required="required" class="form-control"
                            value="{{$value->name_brand}}">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="ma-danh-muc">Trạng thái <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select name="brand_status" class="form-control input-sm m-bot15">
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
                        <input type="file" name="Hinh_anh_brand" id="exampleInputFile">
                        <p class="help-block">Example block-level help text here.</p>
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
                        <button type="submit" name="add_categoryProduct" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@endsection('Admin_content')
