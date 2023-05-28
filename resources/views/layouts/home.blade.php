<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>MTS Roudlotur Rosmani</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('includes.home.style')
</head>

<body>
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ url('logo_mts.png') }}" alt="" class="img-fluid"></a>
            @include('includes.home.navbar')
        </div>
    </header>

    @yield('content')

    @include('includes.home.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    @include('includes.home.script')

</body>
</html>
