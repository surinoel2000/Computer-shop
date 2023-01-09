<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('GEAR PC', 'GEAR PC') }}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Bootstrap -->

    <link type="text/css" rel="stylesheet" href="{{ asset('assetss/css/bootstrap.min.css') }}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assetss/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assetss/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('assetss/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assetss/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('assetss/css/style.css')}}" />
    <style>
        .detail-oder{
            display: none;
        }
    </style>
</head>


<body>
    <!-- HEADER -->
    @include('header')
    <!-- /HEADER -->

    {{--
    <!-- BREADCRUMB -->
    @include('breadcrumb')
    <!-- /BREADCRUMB --> --}}

    <!-- SECTION -->

    <!-- /SECTION -->

    <!-- SECTION -->
    @yield('content')

    <!-- /SECTION -->


    <!-- NEWSLETTER -->
    @include('newletters')
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    @include('footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('assetss/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assetss/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetss/js/slick.min.js') }}"></script>
    <script src="{{ asset('assetss/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assetss/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assetss/js/main.js') }}"></script>

</body>

</html>
