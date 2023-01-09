@extends('admin.layouts.index')
@section('content')
<?php
    $massage = Session::get('massage');
    if($massage){
        echo '<span class="text-alert">',$massage,'</span>';
        Session::put('massage',null);
    }
?>

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
                                                    if($config['field'] == "brand_status"){
                                                        if($record[$config['field']]== 1){
                                                ?>
                        <td><a href="{{URL('admin/brand-Product/unactive-brand-Product/'.$record['brand_code'])}}">
                            <button type="button" class="btn btn-round btn-success">Hiện</button></a></td>

                        <?php
                                                            break;
                                                        }else{
                                                ?>
                        <td><a href="{{URL('admin/brand-Product/active-brand-Product/'.$record['brand_code'])}}"><button
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
                            <a href="{{URL('admin/brand-Product/edit-brand-Product/'.$record['brand_code'])}}"
                                class="active" ui-toggle-class=""><i class="far fa-edit"></i></a>
                            <a href="{{URL('admin/brand-Product/delete-brand-Product/'.$record['brand_code'])}}"
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
    <button type="button" class="primary-btn form-control"
        onclick="window.location.href='{{URL('admin/brand-Product/add-brand-product')}}'">Thêm hãng mới</button>
</div>
@csrf



@csrf
@endsection
