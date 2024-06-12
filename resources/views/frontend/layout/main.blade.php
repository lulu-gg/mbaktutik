<!DOCTYPE html>
<html lang="en">
    
@php 
    $gp = App\Models\GeneralParamter::first();
@endphp

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="keyword" content="@yield('seo', $gp->seo_keyword)">
    <meta name="description" content="@yield('seo_description', $gp->seo_description)">


    @if (env('ENABLE_GOOGLE_ANALYTICS', false))
        <!-- -->
    @endif

    @include('frontend.layout.includes.layout-css')

    @include('frontend.layout.includes.custom-css')

    @if (View::hasSection('title'))
        <title>Mbak Tutik - @yield('title')</title>
    @endif

</head>

<body class="cs-dark">
    @if (env('ENABLE_GOOGLE_ANALYTICS', false))
        <!-- -->
    @endif

    @include('noty::message')

    <!-- Navbar -->
    @include('frontend.layout.includes.navbar')
    <!-- Akhir Navbar -->

    @yield('content')

    @include('frontend.layout.includes.layout-js')

    @include('frontend.layout.includes.custom-script')


</body>

<!-- footer -->
@include('frontend.layout.includes.footer')
<!-- end of footer -->

@stack('page-script')

</html>
