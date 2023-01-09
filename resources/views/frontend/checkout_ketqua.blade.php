@extends('layouts.app')
@section('content')
{{-- <?php if(Str::length($order_detail) <1){ ?> --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-center">Bạn đã đặt hàng thành công<span>&#9989;</span></h3>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    {{-- <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th> --}}
                    {{-- <th style="width: 40px"></th> --}}
                    <th >Mã đơn hàng</th>
                    <th >Sản phẩm</th>
                    <th >Giá</th>
                    <th >Số lượng</th>
                    <th >Tổng giá</th>
                    <th >Ngày đặt mua</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                    foreach($order_detail as $order_details){ ?>
                <tr>

                <tr>
                    <td>{{ $num }}</td>
                    <td class="text-center">{{$order_details->order_id}}</td>
                    <td>{{$order_details->name_product}}</td>
                    <td>{{number_format($order_details->price, 0, ',', ',')}}</td>
                    <td class="text-center">{{$order_details->count_product}}</td>
                    <td>{{$order_details->total_money}}</td>
                    <td>{{$order_details->created_at}}</td>

                <?php $num++; } ?>
            </tbody>
        </table>
    </div>

</div>
{{-- <?php } ?> --}}
@endsection
