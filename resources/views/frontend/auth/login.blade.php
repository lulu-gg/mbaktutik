@extends('frontend.layout.main')
@section('title', 'Login')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Login</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-8 offset-xl-3 offset-md-2">
                <form class="cs-form_card cs-style1 cs-box_shadow cs-white_bg" method="POST"">
                    @csrf
                    <div class="cs-form_card_in">
                        <h2 class="cs-form_title text-center">Scanner Officer</h2>
                        <div class="cs-form_field_wrap">
                            <input type="email" class="cs-form_field @error('email') is-invalid @enderror"
                                placeholder="Your Email" name="email" required>
                            @error('email')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="cs-form_field_wrap">
                            <input type="password" class="cs-form_field @error('password') is-invalid @enderror"
                                placeholder="Your password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback" style="padding-left:20px">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="cs-height_20 cs-height_lg_20"></div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="notify" name="remember">
                            <label class="form-check-label" for="notify">Remember Me</label>
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <button class="cs-btn cs-style1 cs-btn_lg w-100">
                            <span>Sign In</span>
                        </button>
                    </div>
                </form>

                <div class="cs-height_50 cs-height_lg_50"></div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="cs-iconbox cs-style3 cs-box_shadow cs-white_bg">
                            <div class="cs-iconbox_text">
                                <h5 class="cs-form_title">Register Event Organizer</h5>
                                <p>
                                    Sign up now to start creating and managing your events
                                </p>
                            </div>
                            <a href="{{ url('/register/event-organizer') }}" class="cs-iconbox_btn cs-primary_font">
                                Register Now
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5303 6.75396C16.8232 6.46107 16.8232 5.9862 16.5303 5.6933L11.7574 0.920332C11.4645 0.627439 10.9896 0.627439 10.6967 0.920332C10.4038 1.21323 10.4038 1.6881 10.6967 1.98099L14.9393 6.22363L10.6967 10.4663C10.4038 10.7592 10.4038 11.234 10.6967 11.5269C10.9896 11.8198 11.4645 11.8198 11.7574 11.5269L16.5303 6.75396ZM0 6.97363H16V5.47363H0V6.97363Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div class="cs-iconbox cs-style3 cs-box_shadow cs-white_bg">
                            <div class="cs-iconbox_text">
                                <h5 class="cs-form_title">Register Tenant</h5>
                                <p>
                                    Sign up now to start creating and managing your tenant
                                </p>
                            </div>
                            <a href="{{ url('/register/tenant') }}" class="cs-iconbox_btn cs-primary_font">
                                Register Now
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5303 6.75396C16.8232 6.46107 16.8232 5.9862 16.5303 5.6933L11.7574 0.920332C11.4645 0.627439 10.9896 0.627439 10.6967 0.920332C10.4038 1.21323 10.4038 1.6881 10.6967 1.98099L14.9393 6.22363L10.6967 10.4663C10.4038 10.7592 10.4038 11.234 10.6967 11.5269C10.9896 11.8198 11.4645 11.8198 11.7574 11.5269L16.5303 6.75396ZM0 6.97363H16V5.47363H0V6.97363Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                    </div>

                    <div class="col-lg-12 col-sm-12">
                        <div class="cs-iconbox cs-style3 cs-box_shadow cs-white_bg">
                            <div class="cs-iconbox_text">
                                <h5 class="cs-form_title">Login Event Organizer</h5>
                                <p>Access your personalized dashboard manage your events.
                                </p>
                            </div>
                            <a href="{{ url('/dashboard/login') }}" class="cs-iconbox_btn cs-primary_font">
                                Login Now
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5303 6.75396C16.8232 6.46107 16.8232 5.9862 16.5303 5.6933L11.7574 0.920332C11.4645 0.627439 10.9896 0.627439 10.6967 0.920332C10.4038 1.21323 10.4038 1.6881 10.6967 1.98099L14.9393 6.22363L10.6967 10.4663C10.4038 10.7592 10.4038 11.234 10.6967 11.5269C10.9896 11.8198 11.4645 11.8198 11.7574 11.5269L16.5303 6.75396ZM0 6.97363H16V5.47363H0V6.97363Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>

@endsection
