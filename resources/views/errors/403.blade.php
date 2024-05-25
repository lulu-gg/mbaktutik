<!DOCTYPE html>


<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Not Authorized </title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat-pro/assets/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat-pro/assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat-pro/assets/css/demo.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('sneat-pro/assets/vendor/css/pages/page-misc.css') }}">
</head>

<body>

    <!-- Content -->

    <!-- Not Authorized -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">You are not authorized!</h2>
            <p class="mb-4 mx-2">You do not have permission to view this page using the credentials that you have
                provided while login. <br> Please contact your site administrator.</p>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Back to home</a>
            <div class="mt-5">
                <img src="{{ asset('sneat-pro/assets/img/illustrations/girl-with-laptop-light.png') }}"
                    alt="page-misc-not-authorized-light" width="450" class="img-fluid"
                    data-app-light-img="illustrations/girl-with-laptop-light.png"
                    data-app-dark-img="illustrations/girl-with-laptop-dark.png">
            </div>
        </div>
    </div>
    <!-- /Not Authorized -->


</body>

</html>
