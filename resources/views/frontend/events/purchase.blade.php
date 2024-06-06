@extends('frontend.layout.main')
@section('title', 'Events Detail')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Purchase Event Tickets</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/events/detail/{{ $event->slug }}">Events</a></li>
                    <li class="breadcrumb-item active">Purchase</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="row">
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
                    {{-- <div class="col-xl-6">
                        <div class="cs-author_card cs-white_bg cs-box_shadow">
                            <div class="cs-author_img"><img src="{{ asset('frontend/assets/img/avatar/avatar_21.png') }}"
                                    alt=""></div>
                            <div class="cs-author_right">
                                <h3>Audiography</h3>
                                <p>@Stanford V. McCutcheon</p>
                            </div>
                        </div>
                        <div class="cs-height_25 cs-height_lg_25"></div>
                    </div> --}}
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

                                            {{-- <div class="cs-activity_icon cs-center cs-gray_bg cs-accent_color">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.58321 0.709957C6.80344 0.874407 6.18914 1.21704 5.59168 1.82076C5.18675 2.22991 5.00479 2.50229 4.76907 3.05207C4.50504 3.66793 4.48083 3.89286 4.48083 5.73042V7.37635H3.41299C2.54968 7.37635 2.3136 7.3895 2.18057 7.44513C1.96981 7.53316 1.82838 7.66619 1.71925 7.87903C1.6398 8.03397 1.60008 8.62486 1.2546 14.7885C1.04683 18.4956 0.887802 21.6486 0.901176 21.7952C0.933924 22.154 1.17236 22.635 1.43954 22.8813C1.5516 22.9846 1.77688 23.1324 1.94009 23.2097L2.23691 23.3504L6.05108 23.3627L9.86525 23.375L9.73124 23.1405C9.51169 22.7562 9.36302 22.248 9.33844 21.7974C9.30778 21.2353 9.83037 13.8479 9.92639 13.4862C9.96527 13.3396 10.0588 13.1041 10.1341 12.9627C10.2958 12.6594 10.745 12.2223 11.058 12.0637C11.495 11.8422 11.7038 11.8211 13.4676 11.8204L15.1006 11.8198L15.1013 11.6976C15.1016 11.6304 15.0606 10.8055 15.01 9.86466C14.9095 7.99483 14.8896 7.87774 14.6301 7.62567C14.4029 7.40505 14.2408 7.37635 13.2221 7.37635H12.3092L12.2904 5.65453C12.2732 4.07388 12.2639 3.90467 12.1777 3.59066C11.6104 1.52377 9.62549 0.279258 7.58321 0.709957ZM8.86051 2.0029C9.75083 2.16326 10.5632 2.9018 10.8612 3.82163C10.9298 4.03349 10.9426 4.28614 10.9576 5.72118L10.9749 7.37635H11.6417H12.3085L12.2938 8.15083C12.2804 8.85049 12.2702 8.93709 12.1874 9.04787C11.8758 9.46484 11.3401 9.47515 11.0691 9.06938C10.9739 8.92692 10.9682 8.87498 10.9682 8.14737V7.37635H8.39471H5.82118L5.80643 8.15083C5.79305 8.85049 5.78279 8.93709 5.70001 9.04787C5.38839 9.46484 4.85274 9.47515 4.58169 9.06938C4.48651 8.92692 4.48083 8.87498 4.48083 8.14737V7.37635H5.14734H5.81385V5.80112C5.81385 4.10672 5.8302 3.93978 6.04233 3.46904C6.27632 2.94988 6.72745 2.48132 7.25 2.21472C7.68696 1.99179 8.3297 1.90728 8.86051 2.0029ZM11.7014 13.2364C11.4861 13.3362 11.3508 13.4769 11.2592 13.6961C11.1769 13.893 10.6373 21.2578 10.6707 21.7285C10.7251 22.4959 11.2453 23.1174 11.9949 23.3103C12.2061 23.3647 13.0058 23.3726 17.2603 23.3624L22.2767 23.3504L22.5735 23.2097C22.7367 23.1324 22.9614 22.9851 23.0729 22.8824C23.3192 22.6553 23.57 22.1737 23.6098 21.8513C23.6271 21.7113 23.5294 20.0574 23.3663 17.7295C23.0598 13.3569 23.0937 13.5829 22.7036 13.3087L22.5134 13.175L17.1962 13.1645C12.0992 13.1544 11.8717 13.1574 11.7014 13.2364ZM15.4736 15.253C15.7574 15.4157 15.8115 15.5711 15.8115 16.2241C15.8115 16.9539 15.8786 17.177 16.1929 17.4933C16.5907 17.8934 17.1539 17.9713 17.6468 17.6946C18.1309 17.4227 18.2998 17.0384 18.2998 16.2092C18.2998 15.6054 18.3481 15.4412 18.5725 15.2811C18.7704 15.14 19.126 15.1327 19.3047 15.2661C19.5817 15.4729 19.6094 15.5528 19.6248 16.1885C19.65 17.2283 19.439 17.8413 18.8537 18.4286C18.0668 19.2184 16.9536 19.4099 15.9495 18.9283C15.6546 18.7868 15.5055 18.6776 15.2373 18.4061C14.6651 17.8268 14.4806 17.3113 14.4792 16.2883C14.4786 15.8042 14.4924 15.6848 14.567 15.5307C14.7354 15.183 15.1369 15.06 15.4736 15.253Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </div> --}}
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
            </div>
            <div class="col-lg-6">
                <div class="cs-height_0 cs-height_lg_40"></div>
                <div class="cs-single_product_head">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="d-flex justify-content-between w-100">
                        <h2>Personal Information</h2>
                        <h2 style="padding-right:10px;cursor:pointer" onclick="addBillingInformation()">+</h2>
                    </div>
                    <div class="mt-2 ml-2">
                        <form action="{{ url()->current() . '/checkout' }}" method="POST">
                            @csrf
                            <div id="billing-form">
                                <div class="cs-activity cs-white_bg billing-info mb-4">
                                    <div class="row">
                                        <div class="cs-form_field_wrap cs-select_arrow">
                                            <select class="cs-form_field" name="ticket[]" required>
                                                <option selected disabled value="">Select Ticket</option>
                                                @foreach ($ticketVariationsAvailable as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }} |
                                                        @format_currency($item->price)</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="cs-height_25 cs-height_lg_25"></div>
                                        <div class="cs-form_field_wrap">
                                            <input type="number" class="cs-form_field" placeholder="Quantity"
                                                name="quantity[]" required>
                                        </div>
                                        <div class="cs-height_25 cs-height_lg_25"></div>
                                        <div class="cs-form_field_wrap">
                                            <input type="text" class="cs-form_field" placeholder="Fullname"
                                                name="fullname[]" required>
                                        </div>
                                        <div class="cs-height_25 cs-height_lg_25"></div>
                                        <div class="cs-form_field_wrap">
                                            <input type="email" class="cs-form_field" placeholder="Email Address"
                                                name="email[]" required>
                                        </div>
                                        <div class="cs-height_25 cs-height_lg_25"></div>
                                        <div class="cs-form_field_wrap">
                                            <input type="number" class="cs-form_field" placeholder="Phone Number"
                                                name="phone[]" required>
                                        </div>
                                        <div class="cs-height_25 cs-height_lg_25"></div>
                                        <div class="cs-form_field_wrap">
                                            <input class="cs-form_field" placeholder="City" name="city[]" required>
                                        </div>
                                        <div class="cs-height_25 cs-height_lg_25"></div>
                                        <div class="cs-form_field_wrap">
                                            <input type="number" class="cs-form_field" placeholder="NIK" name="nik[]"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="cs-btn cs-style1 cs-btn_lg w-100 text-center">
                                        <span>Proceed Payment</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-height_95 cs-height_lg_70"></div>

    @push('page-script')
        <script>
            function addBillingInformation() {
                var billingInfo = $('.billing-info:first').clone();
                billingInfo.find('input').val(''); // Clear the values of the cloned inputs
                $('#billing-form').append(billingInfo);
            }
        </script>
    @endpush

@endsection
