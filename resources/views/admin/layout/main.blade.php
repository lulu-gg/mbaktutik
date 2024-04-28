<!--

    Development By
    Fairuz Minan - Punggawa Indonesia

-->

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('sneat-pro/assets/') }}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Dashboard</title>

    @include('common.assets.css.layout-css')

    @include('common.assets.css.custom-css')
</head>

<body>

    @include('noty::message')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">

            <!-- Menu -->
            @include('admin.layout.includes.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->

                @include('admin.layout.includes.navbar')

                <!-- / Navbar -->



                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        {{ $slot }}


                    </div>
                    <!-- / Content -->


                    <!-- Footer -->
                    {{-- @include('admin.layout.includes.footer') --}}
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->



    @include('common.assets.js.layout-script')

    @include('common.assets.js.custom-script')

    @yield('page-script')

</body>

</html>

<!-- beautify ignore:end -->
