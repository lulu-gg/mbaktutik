@extends('frontend.layout.main')
@section('title', 'Sponsor')
@section('content')

    <style>
        .sponsor-item {
            padding: 10px;
            /* display: inline-block */
        }
    </style>

    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Sponsor</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Sponsor</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="cs-height_100 cs-height_lg_70"></div>
        <div class="row justify-content-center">
            @foreach ($sponsor as $item)
                <div class="col-lg-2 col-sm-4 col-6">
                    <a href="#" class="cs-card cs-style1 cs-box_shadow text-center cs-white_bg">
                        <div class="cs-card_thumb">
                            <img src="{{ asset('uploads/sponsors/' . $item->logo) }}" alt="Partner logo"
                                class="img img-responsive">
                        </div>
                        <p class="cs-card_title">{{ $item->name }}</p>
                    </a>
                    <div class="cs-height_30 cs-height_lg_30"></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>
@endsection
