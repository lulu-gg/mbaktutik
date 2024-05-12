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

        <!-- Menu -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
        <li
            class="menu-item {{ CustomHelpers::isActiveBool(['admin/events', 'admin/events-category']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div class="text-truncate" data-i18n="Events">Events</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ CustomHelpers::isActive('admin/events') }}">
                    <a href="{{ url('admin/events') }}" class="menu-link">
                        <div data-i18n="Data">Data</div>
                    </a>
                </li>
                <li class="menu-item {{ CustomHelpers::isActive('admin/events-category') }}">
                    <a href="{{ url('admin/events-category') }}" class="menu-link">
                        <div data-i18n="Category">Category</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Scanner Officer -->
        <li class="menu-item {{ CustomHelpers::isActive('admin/scanner-officer') }}">
            <a href="{{ url('admin/scanner-officer') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-scan"></i>
                <div data-i18n="Scanner Officer">Scanner Officer</div>
            </a>
        </li>


        <!-- Sponsors -->
        <li class="menu-item {{ CustomHelpers::isActive('admin/sponsors') }}">
            <a href="{{ url('admin/sponsors') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="Sponsors">Sponsors</div>
            </a>
        </li>

        <!-- Master -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Master</span></li>

        <li class="menu-item {{ CustomHelpers::isActive('admin/user') }}">
            <a href="{{ url('admin/user') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="User">User</div>
            </a>
        </li>

        <li class="menu-item {{ CustomHelpers::isActive('admin/general-parameter') }}">
            <a href="{{ url('admin/general-parameter') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="General Parameter">General Parameter</div>
            </a>
        </li>
        {{-- @endif --}}

    </ul>
</aside>
