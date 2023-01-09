@extends('layouts.app')

<head>
    <title>Endgear - Login</title>
</head>

@section('content')
<div class="section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="login-box">
                <h2> Đăng nhập </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Mật khẩu">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" id="btn-login" class="primary-btn">
                        Đăng nhập
                    </button>
                    {{-- <input id="btn-login" class="primary-btn" type="submit" value="Đăng nhập"> --}}
                    <label> Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký tại đây</a></label>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
