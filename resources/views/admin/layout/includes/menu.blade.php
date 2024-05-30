<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-2" style="padding-left: 5%">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: none!important">
                @if (\App\Helpers\RoleHelpers::isAdmin())
                    <small style="font-size: 70%;padding-left:5px"><i>Rive Administrator</i></small>
                @endif

                @if (\App\Helpers\RoleHelpers::isEventOrganizer())
                    <small style="font-size: 70%;padding-left:5px"><i>Dashboard Organizer</i></small>
                @endif
            </span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a href="{{ url('dashboard/') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Menu -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
        <li
            class="menu-item {{ CustomHelpers::isActiveBool(['dashboard/events', 'dashboard/events-category']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div class="text-truncate" data-i18n="Events">Events</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ CustomHelpers::isActive('dashboard/events') }}">
                    <a href="{{ url('dashboard/events') }}" class="menu-link">
                        <div data-i18n="Data">Data</div>
                    </a>
                </li>
                <li class="menu-item {{ CustomHelpers::isActive('dashboard/events-category') }}">
                    <a href="{{ url('dashboard/events-category') }}" class="menu-link">
                        <div data-i18n="Category">Category</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Scanner Officer -->
        <li class="menu-item {{ CustomHelpers::isActive('dashboard/scanner-officer') }}">
            <a href="{{ url('dashboard/scanner-officer') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-scan"></i>
                <div data-i18n="Scanner Officer">Scanner Officer</div>
            </a>
        </li>

        <!-- Withdrawl -->
        <li class="menu-item {{ CustomHelpers::isActive('dashboard/withdrawl') }}">
            <a href="{{ url('dashboard/withdrawl') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Withdrawl">Withdrawl</div>
            </a>
        </li>

        @if (\App\Helpers\RoleHelpers::isAdmin())
            <!-- Sponsors -->
            <li class="menu-item {{ CustomHelpers::isActive('dashboard/sponsors') }}">
                <a href="{{ url('dashboard/sponsors') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-images"></i>
                    <div data-i18n="Sponsors">Sponsors</div>
                </a>
            </li>

            <!-- Event Organizer Registration -->
            <li class="menu-item {{ CustomHelpers::isActive('dashboard/organizer-registration') }}">
                <a href="{{ url('dashboard/organizer-registration') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="EO Registration">EO Registration</div>
                </a>
            </li>

            <!-- Contact Us -->
            <li class="menu-item {{ CustomHelpers::isActive('dashboard/contact-us') }}">
                <a href="{{ url('dashboard/contact-us') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-message-dots"></i>
                    <div data-i18n="Contact">Contact</div>
                </a>
            </li>
        @endif


        <!-- Report -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Report</span></li>

        <!-- Transacation -->
        <li class="menu-item {{ CustomHelpers::isActive('dashboard/transaction-report') }}">
            <a href="{{ url('dashboard/transaction-report') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Transaction">Transaction</div>
            </a>
        </li>

        <!-- Transacation -->
        <li class="menu-item {{ CustomHelpers::isActive('dashboard/ticket-report') }}">
            <a href="{{ url('dashboard/ticket-report') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-discount"></i>
                <div data-i18n="Ticket">Ticket</div>
            </a>
        </li>


        @if (\App\Helpers\RoleHelpers::isAdmin())
            <!-- Master -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Master</span></li>

            <li class="menu-item {{ CustomHelpers::isActive('dashboard/user') }}">
                <a href="{{ url('dashboard/user') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n="User">User</div>
                </a>
            </li>

            <li class="menu-item {{ CustomHelpers::isActive('dashboard/general-parameter') }}">
                <a href="{{ url('dashboard/general-parameter') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-cog"></i>
                    <div data-i18n="General Parameter">General Parameter</div>
                </a>
            </li>
        @endif

    </ul>
</aside>
