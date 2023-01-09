@extends('layouts.app')
@section('content')
<div class="section" style="background: -webkit-linear-gradient(left, #232328, #d42828);">
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset('uploads/product_imgs/oggy.jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                    foreach($users as $value){ ?>
                    <div class="profile-head">
                        <h5>
                            {{ $value->name }}
                        </h5>
                        <h6>
                            Web Developer and Designer
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>

                        </ul>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Sửa" disabled/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <?php
                        foreach($users as $value){ ?>
                        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Id người dùng:</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $value->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Họ tên:</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $value->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Địa chỉ email:</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $value->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Số điện thoại</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $value->phone_num }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Địa chỉ:</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $value->diachi }}</p>
                                </div>
                            </div>
                        </div>
                        <?php }
                        ?>



                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>

<style>
    body {
        /* background: -webkit-linear-gradient(left, #3931af, #00c6ff); */
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
        border-radius: 180px;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>
@endsection
