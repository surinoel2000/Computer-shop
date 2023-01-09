@extends('admin.layouts.index')
@section('content')

<?php
    $massage = Session::get('massage');
    if($massage){
        echo '<span class="text-alert">',$massage,'</span>';
        Session::put('massage',null);
    }
?>
<div class="page-title">
    <!-- <div class="title_left">
        <h3>Tables <small>Some examples to get you started</small></h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div> -->
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">

        <h2><small>
                <?php echo $table_name ?>
            </small></h2>
        <div class="x_content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php foreach($Configs as $config){ ?>
                        <th>
                            <?=$config['name']?>
                        </th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data as $key => $record){ ?>
                    <tr>
                        <td style="vertical-align: auto;">{{$record->product_code}}</td>
                        <td>{{$record->name_product}}</td>
                        <td>{{$record->name_brand}}</td>
                        <td>{{$record->category_name}}</td>
                        <td>{{number_format($record->price, 0, ',', '.')}}</td>
                        <?php
                                    if($record->product_status == 1){
                                ?>
                        <td><a href="{{URL('admin/Product/unactive-Product/'.$record->product_code)}}"><button
                                    type="button" class="btn btn-round btn-success">Hiện</button></a></td>

                        <?php
                                    }else{
                                ?>
                        <td><a href="{{URL('admin/Product/active-Product/'.$record->product_code)}}"><button
                                    type="button" class="btn btn-round btn-warning">Ẩn</button></a></td>
                        <?php
                                    }
                                ?>

                        <td><img height="75" onerror="this.src='/admin_images/no-avatar.png'"
                                src="/uploads/product_imgs/{{$record->thumbnail_url}}" /></td>
                        <td>{{$record->updated_at}}</td>
                        <td>{{$record->created_at}}</td>
                        <td>
                            <a href="{{URL('admin/Product/edit-Product/'.$record->product_code)}}" class="active"
                                ui-toggle-class=""><button type="button"
                                    class="btn btn-warning btn-sm">SỬA</button></a>
                            <br>
                            <a href="{{URL('admin/Product/delete-Product/'.$record->product_code)}}" class="active"
                                ui-toggle-class=""
                                onclick="return confirm('XÓA LÀ MẤT LUN DỮ LIỆU NGHEN?')"><button
                                    type="button" class="btn btn-danger btn-sm">XÓA</button></a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?= $data->links("pagination::bootstrap-4") ?>


        </div>

    </div>
    <button type="button" class="primary-btn form-control"
        onclick="window.location.href='{{URL('admin/Product/add-product')}}'">Tạo sản phẩm mới</button>
</div>

@csrf
@csrf



@endsection
