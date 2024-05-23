@extends('frontend.layout.main')
@section('title', 'Events Detail')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <div class="cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="cs-height_100 cs-height_lg_70"></div>
        <div class="container">
            <div class="cs-error_card text-center">
                <div class="cs-error_img"><img src="{{ asset('frontend/assets/img/404.svg') }}" alt="404"></div>
                <div class="cs-height_70 cs-height_lg_40"></div>
                <a href="{{ url('/') }}" class="cs-btn cs-style1 cs-btn_lg"><span>Back To Home</span></a>
            </div>
        </div>
        <div class="cs-height_100 cs-height_lg_70"></div>
    </div>
@endsection
