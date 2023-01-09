@extends('layouts.app')
@section('content')
<div class="section">
    @if (Session::has('order-message'))
    <div style="text-align: center;font-size:18px;color:red">{{ Session::get('order-message') }}</div>
    @endif
    @if ($data->count() != 0)

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">

            <h2>Đơn hàng đã đặt <small>

                </small></h2>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th> Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Email đặt hàng</th>
                            <th>Số điện thoại</th>
                            <th> Địa chỉ nhận hàng</th>
                            <th>Tổng tiền hóa đơn</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Chi tiết</th>

                        </tr>
                    </thead>
                    <tbody style="font-size:14px">
                        <?php foreach($data as $key => $record){ ?>
                        <td style="vertical-align: auto;max-width:40px;min-width:40px;">{{$record->id}}</td>
                        <td style="max-width:150px">{{$record->fullname}}</td>
                        <td style="max-width:200px">{{$record->order_email}}</td>
                        <td style="max-width:150px">{{$record->phone_number}}</td>

                        <td style="max-width:200px">{{$record->diachi}}</td>
                        <td>{{number_format($record->total_money, 0, ',', '.')}}</td>
                        <td>
                            @foreach ($order_status as $status )
                            @if ($record->order_status == $status->id_status)
                            {{$status->Name_status}}
                            @endif
                            @endforeach
                        </td>

                        <td style="max-width:90px">{{$record->created_at}}</td>
                        <td>
                            <a class="active" ui-toggle-class="" onclick="addMultipleClass({{$record->id}})"
                                id="{{$record->id}}1"><button type="button" class="btn btn-success btn-sm"><i
                                        class="fa fa-angle-down"></i> Chi tiết </button></a>
                            <a class="active detail-oder" ui-toggle-class=""
                                onclick="removeMultipleClass({{$record->id}})" id="{{$record->id}}12"><button
                                    type="button" class="btn btn-success btn-sm"><i class="fa fa-angle-up"></i>
                                    Chi tiết</button></a>
                        </td>
                        </tr>
                        <tr class="detail-oder" id="{{$record->id}}" style="background-color:white;">
                            <td colspan="10">
                                <section class=" h-100 gradient-custom">
                                    <div class="container  h-100">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col-sm-8 col-lg-8 col-xl-10">
                                                <div class="card" style="border-radius: 10px;">
                                                    <div class="card-header px-4 ">
                                                        <h5 class="text-muted mb-0">Chi tiết đơn hàng, ngày đặt <span
                                                                style="color: #a8729a;">{{$record->created_at}}</span>
                                                        </h5>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-4">
                                                            <p class="lead fw-normal mb-0" style="color: #a8729a;">
                                                                Chi tiết</p>
                                                            <p><span class="small text-muted mb-0">Số điện thoại đặt
                                                                    hàng : </span><span style="font-size:15px">
                                                                    {{$record->phone_number}}</span></p>
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
                                                                    <div
                                                                        class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0">{{$detail->name_product}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0 ">
                                                                            {{$detail->name_brand}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0 ">
                                                                            {{$detail->category_name}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0 ">SL:
                                                                            {{$detail->count_product}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0 ">$
                                                                            {{number_format($detail->total_money, 0,
                                                                            ',', '.')}}</p>
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
        <!-- <button type="button" class="btn btn-primary"
        onclick="window.location.href='{{URL('admin/Product/add-product')}}'">Tạo sản phẩm mới</button> -->
    </div>
    <script>
        function addMultipleClass(id) {
            let element = document.getElementById(id);
            // console.log(id)
            /* thêm multiple class */
            element.classList.remove('detail-oder');
            id1 = id + '1';
            addMultipleClass1(id1)
            // element.classList.add('current');
        }
        function removeMultipleClass(id) {
            let element = document.getElementById(id);
            // console.log(id)
            /* thêm multiple class */
            element.classList.add('detail-oder');
            id1 = id + '1';
            removeMultipleClass1(id1)

            /* thêm multiple class */
            // element.classList.remove('current');
        }
        function addMultipleClass1(id) {
            let element = document.getElementById(id);
            id1 = id + '2';
            let element1 = document.getElementById(id1);
            console.log(id);
            /* thêm multiple class */
            element1.classList.remove('detail-oder');
            element.classList.add('detail-oder');
        }
        function removeMultipleClass1(id) {
            let element = document.getElementById(id);
            id1 = id + '2';
            let element1 = document.getElementById(id1);
            element1.classList.add('detail-oder');
            element.classList.remove('detail-oder');
        }
    </script>

    @endif

</div>
@endsection
