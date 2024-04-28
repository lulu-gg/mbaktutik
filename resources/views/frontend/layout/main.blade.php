<!--

    Development By
    Fairuz Minan - Punggawa Indonesia

-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @if (env('ENABLE_GOOGLE_ANALYTICS', false))
        <!-- -->
    @endif

    @include('frontend.layout.includes.layout-css')
    <title>Rive</title>
</head>

<body id="home">
    @if (env('ENABLE_GOOGLE_ANALYTICS', false))
        <!-- -->
    @endif

    @include('noty::message')

    <!-- Navbar -->
    @include('frontend.layout.includes.navbar')
    <!-- Akhir Navbar -->

    {{ $slot }}

    @include('frontend.layout.includes.layout-js')

    @include('frontend.layout.includes.custom-script')


    @yield('page-script')
</body>

<!-- footer -->
@include('frontend.layout.includes.footer')
<!-- end of footer -->

</html>