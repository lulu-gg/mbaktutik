<!-- Navbar -->
<input type="checkbox" id="toggle">
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand ps-0 ps-md-5 ps-lg-4 ps-xl-5" href="{{ url('/') }}">
            <img src="{{ asset('frontend/assets/img/Logo.svg') }}" alt="Logo" height="28px" class="" />
        </a>

        <label class="navbar-toggler pe-3 pe-md-5 pe-lg-4 pe-xl-5" style="color:none;border:none;" for="toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>
        <ul class="nav-list navbar-nav ms-auto p-3 mb-2 mb-lg-0 pe-0 pe-md-5 pe-lg-4 pe-xl-5">
            <li class="nav-item align-self-center align-self-md-start me-2">
                <a class="nav-link active text-light" href="{{ url('/') }}">Beranda</a>
            </li>
            <li class="nav-item align-self-center align-self-md-start me-2">
                <a class="nav-link active text-light" href="{{ url('/tracking/resi') }}">Pelacakan</a>
            </li>
            <li class="nav-item align-self-center align-self-md-start me-2">
                <a class="nav-link active text-light" href="{{ url('/service') }}">Layanan</a>
            </li>
            <li class="nav-item align-self-center align-self-md-start me-2">
                <a class="nav-link active text-light" href="{{ url('/about-us') }}">Tentang Kami</a>
            </li>

            @auth
                @if (\App\Helpers\RoleHelpers::isClient())
                    <li class="nav-item align-self-center align-self-md-start me-2">
                        <a href="{{ url('/dashboard') }}">
                            <button class="button-secondary p-1">Dashboard</button>
                        </a>
                    </li>
                @endif

                @if (\App\Helpers\RoleHelpers::isAdmin())
                    <li class="nav-item align-self-center align-self-md-start me-2">
                        <a href="{{ url('/admin') }}">
                            <button class="button-secondary p-1">Dashboard</button>
                        </a>
                    </li>
                @endif

                @if (\App\Helpers\RoleHelpers::isDriver())
                    <li class="nav-item align-self-center align-self-md-start me-2">
                        <a href="{{ url('/driver') }}">
                            <button class="button-secondary p-1">Dashboard</button>
                        </a>
                    </li>
                @endif
            @endauth

            @guest
                <li class="nav-item align-self-center align-self-md-start me-2">
                    <a href="{{ url('/dashboard/login') }}">
                        <button class="button-primary">Masuk</button>
                    </a>
                </li>
                <li class="nav-item align-self-center align-self-md-start me-2">
                    <a href="{{ url('/dashboard/register') }}">
                        <button class="button-secondary">Daftar</button>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<!-- Akhir Navbar -->
