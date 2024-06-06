<div class="cs-preloader cs-center">
    <div class="cs-preloader_in"></div>
    <span>Loading</span>
</div>
<header class="cs-site_header cs-style1 cs-sticky-header cs-white_bg">
    <div class="cs-main_header">
        <div class="container-fluid">
            <div class="cs-main_header_in">
                <div class="cs-main_header_left">
                    <a class="cs-site_branding" href="/"><img src="{{ asset('images/logo-white.png') }}" alt="Logo" style="height: 25px !important"></a>
                </div>
                <div class="cs-main_header_right">
                    {{-- <div class="cs-search_wrap">
                        <form action="#" class="cs-search">
                            <input type="text" class="cs-search_input" placeholder="Search">
                            <button class="cs-search_btn">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z"
                                        stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M17.5 18L13.875 14.375" stroke="currentColor" stroke-opacity="0.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div> --}}
                    <div class="cs-nav_wrap">
                        <div class="cs-nav_out">
                            <div class="cs-nav_in">
                                <div class="cs-nav">
                                    <ul class="cs-nav_list">
                                        <li>
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/events') }}">Events</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/sponsors') }}">Sponsors</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/contact') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cs-header_btns_wrap">
                        <div class="cs-header_btns">
                            {{-- <div class="cs-header_icon_btn cs-center cs-mobile_search_toggle">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.5 18L13.875 14.375" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div> --}}

                            @if (\App\Helpers\RoleHelpers::isScanOfficer())
                                {{-- <div class="cs-toggle_box cs-profile_box">
                                    <div class="cs-toggle_btn cs-header_icon_btn cs-center">
                                        <a href="{{ url('account') }}">
                                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.5 15.75V14.25C15.5 13.4544 15.1839 12.6913 14.6213 12.1287C14.0587 11.5661 13.2956 11.25 12.5 11.25H6.5C5.70435 11.25 4.94129 11.5661 4.37868 12.1287C3.81607 12.6913 3.5 13.4544 3.5 14.25V15.75"
                                                    stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M9.5 8.25C11.1569 8.25 12.5 6.90685 12.5 5.25C12.5 3.59315 11.1569 2.25 9.5 2.25C7.84315 2.25 6.5 3.59315 6.5 5.25C6.5 6.90685 7.84315 8.25 9.5 8.25Z"
                                                    stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div> --}}
                                <a href="javascript:document.getElementById('signout-form').submit();"
                                    class="cs-btn cs-style1"><span>Logout</span></a>
                                <div>
                                    <form action="{{ url('/logout') }}" id="signout-form" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            @else
                                <a href="{{ url('/login') }}" class="cs-btn cs-style1"><span>Login</span></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
