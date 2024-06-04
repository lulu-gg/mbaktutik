@extends('frontend.layout.main')
@section('title', 'Events')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Explore</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Explore</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="cs-sidebar_frame cs-style1">
            <div class="cs-sidebar_frame_left">
                <div class="cs-filter_sidebar">
                    <form action="" class="">
                        <div class="cs-search_widget">
                            <div class="cs-search">
                                <input type="text" class="cs-search_input" placeholder="Search" name="name"
                                    value="{{ Request::get('name') }}">
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
                            </div>
                        </div>
                        <div class="cs-filter_widget">
                            <h2 class="cs-filter_toggle_btn">
                                Catagory
                                <span class="cs-arrow_icon">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.679688 0.96582L4.67969 4.96582L8.67969 0.96582" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </h2>
                            <div class="cs-filter_toggle_body">
                                <ul>
                                    @foreach ($eventCategorys as $item)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="category"
                                                    id="{{ $item->id }}" value="{{ $item->id }}"
                                                    @if (Request::get('category') == $item->id) checked @endif>
                                                <label class="form-check-label"
                                                    for="{{ $item->id }}">{{ $item->name }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="cs-filter_widget">
                            <h2 class="cs-filter_toggle_btn">
                                Status
                                <span class="cs-arrow_icon">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.679688 0.96582L4.67969 4.96582L8.67969 0.96582" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </h2>
                            <div class="cs-filter_toggle_body">
                                <ul>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1"
                                                id="status-1" @if (Request::get('status') == 1) checked @endif>
                                            <label class="form-check-label" for="status-1">On Going</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="2"
                                                id="status-2" @if (Request::get('status') == 2) checked @endif>
                                            <label class="form-check-label" for="status-2">Past</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cs-filter_widget">
                            <div class="row row-15">
                                <div class="col-lg-6">
                                    <input type="reset" class="cs-btn cs-style1 cs-color1 cs-btn_sm" value="Clear"
                                        onclick="clearSearch()">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="cs-btn cs-style1 cs-btn_sm"><span>Apply</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="cs-sidebar_frame_right">
                <div class="row">
                    @foreach ($events as $item)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
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
                            <div class="cs-height_30 cs-height_lg_30"></div>
                        </div>
                    @endforeach
                </div>
                <div class="cs-height_10 cs-height_lg_10"></div>
                {{-- <div class="text-center">
                    <a href="#" class="cs-btn cs-style1 cs-btn_lg"><span>Load More</span></a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>

    @push('page-script')
        <script>
            function clearSearch() {
                window.location.href = '{{ url('/events') }}';
            }
        </script>
    @endpush
@endsection
