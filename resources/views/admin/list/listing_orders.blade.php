@extends('admin.layouts.index')

@section('content')
<style>
        .detail-oder{
            display: none;
        }
    </style>
<?php
    $massage = Session::get('massage');
    if($massage){
        echo '<span class="text-alert">',$massage,'</span>';
        Session::put('massage',null);
    }
?>
<div class="page-title">
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

                        <td>{{$record->id}}</td>
                        <td>
                        <select id="cars" name="cars" onchange="location = this.value;">
                        @foreach ($order_status as $status )
                            @if ($record->order_status == $status->id_status)
                                <option value="{{$status->id_status}}" name1="{{$record->id}}" selected >{{$status->Name_status}}</option>
                            @else
                                <option value="{{URL::to('/admin/order/change-status/'.$record->id.'/'.$status->id_status)}}" name1="{{$record->id}}" >{{$status->Name_status}}</option>
                            @endif
                        @endforeach
                    </select>
                        </td>
                        <td>{{$record->fullname}}</td>
                        <td>{{ $record->phone_number }}</td>
                        <td>{{ $record->diachi }}</td>
                        <td>{{ $record->updated_at }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>
                        <a href="{{URL('admin/Product/delete-Product/'.$record->id)}}" class="active"
                            ui-toggle-class=""
                            onclick="return confirm('Bạn chắc chắn muốn xóa? Dữ liệu sẽ không thể khôi phục')"><button disabled
                                type="button" class="btn btn-danger btn-sm">DEL</button></a>
                                <br>
                        <a class="active"
                            ui-toggle-class=""
                            onclick="addMultipleClass({{$record->id}})" id="{{$record->id}}1"><button
                                type="button" class="btn btn-success btn-sm"><i class="fa fa-angle-down"></i> De</button></a>
                        <a class="active detail-oder"
                            ui-toggle-class=""
                            onclick="removeMultipleClass({{$record->id}})"id="{{$record->id}}12"><button
                                type="button" class="btn btn-success btn-sm"><i class="fa fa-angle-up"></i> De</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10" class="detail-oder"  id="{{$record->id}}">
                            <section class=" h-100 gradient-custom" >
                            <div class="container  h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-sm-8 col-lg-8 col-xl-10">
                                    <div class="card" style="border-radius: 10px;">
                                    <div class="card-header px-4 ">
                                        <h5 class="text-muted mb-0">Chi tiết đơn hàng, ngày đặt <span style="color: #a8729a;">{{$record->created_at}}</span></h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                        <p ><span class="small text-muted mb-0">Số điện thoại đặt hàng : </span><span style="font-size:15px"> {{$record->phone_number}}</span></p>
                                        </div>
                                        <div class="card shadow-0 border mb-4">
                                        @foreach ($order_detail as $detail)

                                        @if ($detail->order_id == $record->id)


                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-md-2">
                                                <img src="/uploads/product_imgs/{{$detail->thumbnail_url}}"
                                                class="img-fluid" alt="Phone">
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">{{$detail->name_product}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 ">{{$detail->name_brand}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 ">{{$detail->category_name}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 ">SL: {{$detail->count_product}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 ">$ {{number_format($detail->total_money, 0, ',', '.')}}</p>
                                            </div>
                                            </div>
                                            <!-- <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;"> -->
                                            <div class="row d-flex align-items-center">

                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        </div>




                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </section>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?= $data->links("pagination::bootstrap-4") ?>


        </div>

    </div>
    <button disabled type="button" class="primary-btn form-control"
        onclick="window.location.href='{{URL('admin/Product/add-product')}}'">---</button>
</div>
<script>
    function addMultipleClass(id) {
        let element = document.getElementById(id);
        // console.log(id)
        /* thêm multiple class */
        element.classList.remove('detail-oder');
        id1 = id+'1';
        addMultipleClass1(id1)
        // element.classList.add('current');
    }
    function removeMultipleClass(id) {
        let element = document.getElementById(id);
        // console.log(id)
        /* thêm multiple class */
        element.classList.add('detail-oder');
        id1 = id+'1';
        removeMultipleClass1(id1)

        /* thêm multiple class */
        // element.classList.remove('current');
    }
    function addMultipleClass1(id) {
        let element = document.getElementById(id);
        id1 = id+'2';
        let element1 = document.getElementById(id1);
        console.log(id);
        /* thêm multiple class */
        element1.classList.remove('detail-oder');
        element.classList.add('detail-oder');
    }
    function removeMultipleClass1(id) {
        let element = document.getElementById(id);
        id1 = id+'2';
        let element1 = document.getElementById(id1);
        element1.classList.add('detail-oder');
        element.classList.remove('detail-oder');
    }
</script>
@endsection
