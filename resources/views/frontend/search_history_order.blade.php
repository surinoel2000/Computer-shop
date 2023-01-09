@extends('layouts.app')
@section('content')'
<div class="section">
    <h2 style="align-items: center">Tìm kiếm lịch sử đơn hàng</h2>
    <div class="container">
        <form action="history-order" method="GET">
            <div class="row card-margin">
                <div class="col-6 " style="margin: auto;">
                    {{-- <div class="col-sm-3 ">
                        <label for="">Số điện thoại</label>
                    </div> --}}
                    <div class="col-sm-8 ">
                        <input type="search" class=" input" name="search_order"
                            onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                            pattern="(84|0[3|5|7|8|9])+([0-9]{8})\b" maxlength="10" placeholder="Số điện thoại">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="col-sm-4 fa fa-search primary-btn"></button>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
@endsection