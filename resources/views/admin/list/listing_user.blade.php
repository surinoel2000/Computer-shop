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

                    <?php foreach($data as $key => $record){ ?>
                    <tr>
                        <td style="vertical-align: auto;">{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td>{{$record->phone_num}}</td>
                        <td>{{$record->diachi}}</td>

                        <td>{{$record->updated_at}}</td>
                        <td>{{$record->created_at}}</td>
                        <td>
                            <a href="{{URL('admin/Product/edit-Product/'.$record->id)}}" class="active"
                                ui-toggle-class=""><button disabled type="button"
                                    class="btn btn-warning btn-sm">EDIT</button></a>
                            <br>
                            <a href="{{URL('admin/Product/delete-Product/'.$record->id)}}" class="active"
                                ui-toggle-class=""
                                onclick="return confirm('XÓA LÀ MẤT LUN DỮ LIỆU NGHEN?')"><button disabled
                                    type="button" class="btn btn-danger btn-sm">DEL</button></a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?= $data->links("pagination::bootstrap-4") ?>


        </div>

    </div>
    {{-- <button type="button" class="primary-btn form-control"
        onclick="window.location.href='{{URL('admin/Product/add-product')}}'">Tạo tài khoản</button> --}}
</div>
<!-- <form action="{{url('admin/import-sv')}}" method="POST" enctype="multipart/form-data">
@csrf
<input type="file" name="file" accept=".xlsx, .xls, .csv" required><br>
<input type="submit" value="Import EXCEL" name="import" class="btn btn-warning">
</form>
{{-- <form action="{{url('admin/export-sv')}}" method="POST"> --}}
@csrf
<input type="submit" value="Export EXCEL" name="export" class="btn btn-success">
</form> -->
<div class="x-panel">

</div>
@endsection
