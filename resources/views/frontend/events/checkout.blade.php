@extends('frontend.layout.main')
@section('title', 'Events Detail')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Checkout Event Tickets</h1>
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
                    <h2>Order Detail</h2>
                    <div class="mt-2 ml-2">
                        <div class="cs-activity cs-white_bg billing-info mb-4">
                            <div class="row">
                                <div class="col-3 mb-3">Event</div>
                                <div class="col-9">{{ $event->name }}</div>
                                <div class="col-3 mb-3">Location</div>
                                <div class="col-9">{{ $event->location }}</div>
                                <div class="col-3 mb-3">Subtotal</div>
                                <div class="col-9">@format_currency($subtotal)</div>
                                <div class="col-3 mb-3">Service Fee</div>
                                <div class="col-9">@format_currency($serviceFee)</div>
                                <div class="col-3 mb-3">Total</div>
                                <div class="col-9">@format_currency($serviceFee + $subtotal)</div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url()->current() . '/proceed' }}" method="POST">
                        @csrf
                        <input type="hidden" name="encData" value="{!! $encryptedData !!}">
                        <button type="submit" class="cs-btn cs-style1 cs-btn_lg w-100 text-center">
                            <span>Checkout Now</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cs-height_0 cs-height_lg_40"></div>
                <div class="cs-single_product_head">
                    <h2>Personal Information</h2>
                    <div class="mt-2 ml-2">
                        @foreach ($formData as $item)
                            <div class="cs-activity cs-white_bg billing-info mb-4">
                                <div class="row">
                                    <div class="col-2 mb-2">Fullname</div>
                                    <div class="col-10">{{ $item->fullname }}</div>
                                    <div class="col-2 mb-2">Email</div>
                                    <div class="col-10">{{ $item->email }}</div>
                                    <div class="col-2 mb-2">Phone</div>
                                    <div class="col-10">{{ $item->phone }}</div>
                                    <div class="col-2 mb-2">City</div>
                                    <div class="col-10">{{ $item->city }}</div>
                                    <div class="col-2 mb-2">NIK</div>
                                    <div class="col-10">{{ $item->nik }}</div>
                                    <div class="col-2 mb-2">Ticket</div>
                                    <div class="col-10">{{ $item->ticket->name }}</div>
                                    <div class="col-2 mb-2">Quantity</div>
                                    <div class="col-10">{{ $item->quantity }}</div>
                                    <div class="col-2 mb-2">Price</div>
                                    <div class="col-10">@format_currency($item->price)</div>
                                    <div class="col-2 mb-2">Total</div>
                                    <div class="col-10">@format_currency($item->quantity * $item->price)</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-height_95 cs-height_lg_70"></div>

@endsection
