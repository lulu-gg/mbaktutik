@extends('frontend.layout.main')
@section('title', 'Register')
@section('content')
<div class="cs-height_90 cs-height_lg_80"></div>
<section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
    <div class="container">
        <div class="text-center">
            <h1 class="cs-page_title">Organizer Register</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Organizer Register</li>
            </ol>
        </div>
    </div>
</section>
<div class="cs-height_100 cs-height_lg_70"></div>
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-md-8 offset-xl-3 offset-md-2">
            <form class="cs-form_card cs-style1 cs-box_shadow cs-white_bg">
                <div class="cs-form_card_in">
                    <h2 class="cs-form_title text-center">Create Account</h2>
                    <div class="cs-form_btns">
                        <a href="#" class="cs-btn cs-style2 cs-btn_lg">
                            <span><i class="fab fa-google"></i>Google</span>
                        </a>
                        <a href="#" class="cs-btn cs-style2 cs-btn_lg">
                            <span><i class="fab fa-facebook-f"></i>Facebook</span>
                        </a>
                        <a href="#" class="cs-btn cs-style2 cs-btn_lg">
                            <span><i class="fab fa-linkedin-in"></i>Linkedin</span>
                        </a>
                    </div>
                    <div class="cs-height_30 cs-height_lg_30"></div>
                    <div class="cs-form_field_wrap">
                        <input type="text" class="cs-form_field" placeholder="Username">
                    </div>
                    <div class="cs-height_20 cs-height_lg_20"></div>
                    <div class="cs-form_field_wrap">
                        <input type="email" class="cs-form_field" placeholder="Your Email">
                    </div>
                    <div class="cs-height_20 cs-height_lg_20"></div>
                    <div class="cs-form_field_wrap">
                        <input type="password" class="cs-form_field" placeholder="Set your password">
                    </div>
                    <div class="cs-height_20 cs-height_lg_20"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="notify">
                        <label class="form-check-label" for="notify">I'm attracted in receiving marketing emails for
                            updates on upcoming promotions, events and new features</label>
                    </div>
                    <div class="cs-height_10 cs-height_lg_10"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms">
                        <label class="form-check-label" for="terms">I'm attracted in receiving marketing emails for
                            updates on upcoming promotions, events and new features</label>
                    </div>
                    <div class="cs-height_20 cs-height_lg_20"></div>
                    <button class="cs-btn cs-style1 cs-btn_lg w-100">
                        <span>Register Now</span>
                    </button>
                    <div class="cs-height_30 cs-height_lg_30"></div>
                    <div class="cs-form_footer text-center">Have an account? <a href="#">Log In</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="cs-height_100 cs-height_lg_70"></div>

@endsection