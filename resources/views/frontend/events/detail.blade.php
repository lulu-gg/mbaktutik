@extends('frontend.layout.main')
@section('title', 'Events Detail')
@section('seo', $event->seo)
@section('seo_description', $event->seo_description)
@section('content')
    <style>
        .container-event {
            width: 100%;
            overflow: hidden;
            /* Ensures no scrollbars if image overflows */
        }

        .banner-event {
            width: 100%;
            height: 400px;
            /* Set the desired height for the banner */
            position: relative;
            /* Needed for absolute positioning of the image */
        }

        .banner-event img {
            width: 100%;
            height: auto;
            /* Maintains aspect ratio */
            position: absolute;
            top: 0;
            /* Positions the image at the top of the container */
            left: 0;
        }
    </style>

    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Explore Details</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Event Details</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="container-event">
            <div class="banner-event">
                <img src="{{ $event->banner_path }}" alt="Banner">
            </div>
        </div>
    </div>
    <div class="cs-height_75 cs-height_lg_50"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="cs-slider_thumb_lg">
                    <img src="{{ $event->thumbnail_path }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cs-height_0 cs-height_lg_40"></div>
                <div class="cs-single_product_head">
                    <h2>{{ $event->name }}</h2>
                    {!! $event->status_time_span !!}
                </div>
                <div class="cs-height_25 cs-height_lg_25"></div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="cs-author_card cs-white_bg cs-box_shadow">
                            <div class="cs-author_img"><img src="{{ $event->organizer->logo_path }}" alt=""></div>
                            <div class="cs-author_right">
                                <h3>Event Organizer</h3>
                                <p>{{ $event->organizer->company_name }}</p>
                            </div>
                        </div>
                        <div class="cs-height_25 cs-height_lg_25"></div>
                    </div>
                </div>
                <div class="cs-tabs cs-fade_tabs cs-style1">
                    <div class="cs-medium">
                        <ul class="cs-tab_links cs-style1 cs-medium cs-primary_color cs-mp0 cs-primary_font">
                            <li class="active"><a href="#Description">Description</a></li>
                            <li><a href="#Location">Location</a></li>
                        </ul>
                    </div>
                    <div class="cs-height_20 cs-height_lg_20"></div>
                    <div class="cs-tab_content">
                        <div id="Description" class="cs-tab active">
                            <div class="cs-white_bg cs-box_shadow cs-general_box_5">
                                {{ $event->description }}
                            </div>
                        </div>
                        <div id="Location" class="cs-tab">
                            <div class="cs-white_bg cs-box_shadow cs-general_box_5">
                                <div class="row">
                                    <div class="col-2 mb-2">Location</div>
                                    <div class="col-10">{{ $event->location }}</div>
                                    <div class="col-2 mb-2">Province</div>
                                    <div class="col-10">{{ $event->province }}</div>
                                    <div class="col-2 mb-2">City</div>
                                    <div class="col-10">{{ $event->city }}</div>
                                    <div class="col-2 mb-2">ZIP</div>
                                    <div class="col-10">{{ $event->zip }}</div>
                                    <div class="col-2 mb-2">Location</div>
                                </div>
                                <div class="row">
                                    <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0"
                                        marginwidth="0"
                                        src="https://maps.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}&z=14&amp;output=embed">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs-height_25 cs-height_lg_25"></div>
                <div class="cs-tabs cs-fade_tabs cs-style1">
                    <div class="cs-medium">
                        <ul class="cs-tab_links cs-style1 cs-medium cs-primary_color cs-mp0 cs-primary_font">
                            <li class="active"><a href="#tab_one">Ticket</a></li>
                        </ul>
                    </div>
                    <div class="cs-height_20 cs-height_lg_20"></div>
                    <div class="cs-tab_content">
                        <div id="tab_one" class="cs-tab active">
                            <ul class="cs-activity_list cs-mp0">
                                @if ($event->isPast())
                                    <li>
                                        <div class="cs-activity cs-white_bg cs-type1">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="cs-activity_right">
                                                    <p class="cs-activity_text">
                                                        Ticket tidak tersedia pada event yang sudah berlalu
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    @forelse ($event->ticketVariations as $ticket)
                                        <li>
                                            <div class="cs-activity cs-white_bg cs-type1">
                                                <div class="d-flex justify-content-between align-items-center w-100">

                                                    <div class="cs-activity_right">
                                                        <p class="cs-activity_text">
                                                            {{ $ticket->name }}
                                                        </p>
                                                        <p class="cs-activity_posted_by">
                                                            @if ($ticket->total_available > 0)
                                                                @if ($ticket->status == 0)
                                                                    Not Available
                                                                @endif

                                                                @if ($ticket->status == 1)
                                                                    Available
                                                                @endif
                                                            @else
                                                                Sold Out
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p class="cs-activity_text">
                                                            @format_currency($ticket->price)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>
                                            <div class="cs-activity cs-white_bg cs-type1">
                                                <div class="d-flex justify-content-between align-items-center w-100">
                                                    <div class="cs-activity_right">
                                                        <p class="cs-activity_text">
                                                            Belum ada ticket tersedia
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforelse
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cs-height_30 cs-height_lg_30"></div>
                {{-- <div class="row">
                    <div class="col-xl-6">
                        <div class="cs-general_box_4 cs-box_shadow cs-white_bg cs-center">
                            <div class="cs-countdown" data-countdate="24 August 2022">
                                <div class="cs-countdown_item">
                                    <div class="cs-countdown_number">
                                        <div class="cs-count_days"></div>
                                    </div>
                                    <h3 class="cs-countdown_text">Days</h3>
                                </div>
                                <div class="cs-countdown_item">
                                    <div class="cs-countdown_number">
                                        <div class="cs-count_hours"></div>
                                    </div>
                                    <h3 class="cs-countdown_text">Hours</h3>
                                </div>
                                <div class="cs-countdown_item">
                                    <div class="cs-countdown_number">
                                        <div class="cs-count_minutes"></div>
                                    </div>
                                    <h3 class="cs-countdown_text">Min</h3>
                                </div>
                                <div class="cs-countdown_item">
                                    <div class="cs-countdown_number">
                                        <div class="cs-count_seconds"></div>
                                    </div>
                                    <h3 class="cs-countdown_text">Sec</h3>
                                </div>
                            </div>
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                    </div>
                    <div class="col-xl-6">
                        <div class="cs-white_bg cs-box_shadow cs-general_box_5">
                            <div class="cs-social_widget justify-content-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                    </div>
                </div> --}}
                <div class="cs-height_10 cs-height_lg_10"></div>

                @if (count($event->ticketVariations) > 0 && !$event->isPast())
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ url()->current() . '/purchase' }}"
                                class="cs-btn cs-style1 cs-btn_lg w-100 text-center"><span>Buy Now</span></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
        <h2 class="cs-section_heading cs-style1">Other Events</h2>
        <div class="cs-height_45 cs-height_lg_45"></div>
        <div class="cs-grid_5 cs-gap_30">
            @foreach ($otherEvents as $item)
                <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
                    <a href="{{ url('/events/detail/' . $item->slug) }}" class="cs-card_thumb cs-zoom_effect">
                        <img src="{{ $item->thumbnail_path }}" alt="Image" class="cs-zoom_item">
                    </a>
                    <div class="cs-card_info">
                        <a href="#" class="cs-avatar cs-white_bg">
                            <img src="{{ $item->organizer->logo_path }}" alt="Avatar">
                            <span>{{ $item->organizer->company_name }}</span>
                        </a>
                        <h3 class="cs-card_title">
                            <a href="{{ url('/events/detail/' . $item->slug) }}">{{ $item->name }}</a>
                        </h3>
                        <div class="cs-card_price">Start Date: <b
                                class="cs-primary_color">{{ date('d M, H:i:s', strtotime($item->start_date)) }}</b>
                            <div class="cs-card_price">End Date: <b
                                    class="cs-primary_color">{{ date('d M, H:i:s', strtotime($item->end_date)) }}</b>
                            </div>
                            <div class="cs-card_price">
                                {!! $item->status_time_span !!}
                            </div>

                            <hr>
                            @if ($item->isPast())
                                <div class="cs-card_footer">
                                    <span class="cs-card_btn_2" style="background: grey">
                                        <span>
                                            Unavailable
                                        </span>
                                    </span>
                                </div>
                            @else
                                <div class="cs-card_footer">
                                    <a href="{{ url('/events/detail/' . $item->slug) }}">
                                        <span class="cs-card_btn_2">
                                            <span>
                                                Buy Ticket
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>

@endsection
