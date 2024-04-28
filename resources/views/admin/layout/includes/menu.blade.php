<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-2" style="padding-left: 5%">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- <img src="{{ asset('images/logo-transparent-150.png') }}" style="height: 5em" alt="logo"> --}}
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: none!important">
                <small style="font-size: 70%;padding-left:5px"><i>Rive Administrator</i></small>
            </span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a href="{{ url('admin/') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        @if (\App\Helpers\RoleHelpers::isAdmin())
            <!-- Master -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Master</span></li>

            <li class="menu-item {{ CustomHelpers::isActive('admin/user') }}">
                <a href="{{ url('admin/user') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n="User">User</div>
                </a>
            </li>
        @endif

    </ul>
</aside>
