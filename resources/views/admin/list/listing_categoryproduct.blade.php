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
                    <?php foreach($records as $record){ ?>
                    <tr>
                        <?php foreach ($Configs as $config) { ?>
                        <?php switch ($config['type']) {
                                            case "string":
                                                ?>

                        <td>
                            <?= $record[$config['field']] ?>
                        </td>
                        <?php
                                                break;
                                            case "image":?>
                        <td><img height="75" onerror="this.src='/admin_images/no-avatar.png'"
                                src="<?= $record[$config['field']] ?>" /></td>
                        <?php break;
                                            case "number":?>
                        <?php
                                                    if($config['field'] == "category_status"){
                                                        if($record[$config['field']]== 1){
                                                ?>
                        <td><a
                                href="{{URL('admin/category-Product/unactive-category-Product/'.$record['category_code'])}}">
                                <button type="button" class="btn btn-round btn-success">Hiện</button></a></td>

                        <?php
                                                            break;
                                                        }else{
                                                ?>
                        <td><a
                                href="{{URL('admin/category-Product/active-category-Product/'.$record['category_code'])}}"><button
                                type="button" class="btn btn-round btn-warning">Ẩn</button></a></td>
                        <?php
                                                            break;
                                                        }
                                                    }
                                                ?>
                        <td>
                            <?= number_format($record[$config['field']], 0, ',', '.')?>
                        </td>
                        <?php
                                                break;
                                        }
                                    ?>
                        <?php } ?>
                        <td>
                            <a href="{{URL('admin/category-Product/edit-category-Product/'.$record['category_code'])}}"
                                class="active" ui-toggle-class=""><i class="far fa-edit"></i></a>
                            <a href="{{URL('admin/category-Product/delete-category-Product/'.$record['category_code'])}}"
                                class="active" ui-toggle-class=""
                                onclick="return confirm('XÓA LÀ MẤT LUN DỮ LIỆU NGHEN?')"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?= $records->links("pagination::bootstrap-4") ?>

        </div>

    </div>
    <button type="button" class="primary-btn form-control fa-solid fa-plus"
        onclick="window.location.href='{{URL('admin/category-Product/add-category-product')}}'">Tạo danh mục
        mới</button>
</div>
<!-- <form action="{{url('admin/import-sv')}}" method="POST" enctype="multipart/form-data">
@csrf

@csrf





@endsection
