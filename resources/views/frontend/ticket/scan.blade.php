@extends('frontend.layout.main')
@section('title', 'Scan Ticket')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Event Tickets</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Ticket</li>
                    <li class="breadcrumb-item active">Scan</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_50 cs-height_lg_70"></div>
    <div class="d-flex justify-content-center align-item-center">
        <div class="cs-activity cs-white_bg billing-info mb-4">
            <div class="d-flex justify-content-center flex-column">
                @if ($hasAccess)
                    <div id="qrcode"></div>
                    <h4 class="text-center mt-4 m-0">{{ $ticket->ticket_code }}</h4>
                @else
                    <h3 class="text-center">You don't have access to scan this ticket</h3>
                    <p class="text-center">It looks like you don't have the necessary permissions to scan this ticket.
                        <br>
                        Please contact the event organizer for assistance or further information.
                    </p>
                @endif
            </div>
        </div>
    </div>

    @if ($hasAccess)
        <div class="d-flex justify-content-center align-item-center">
            <div class="cs-activity cs-white_bg billing-info">
                <div style="width:350px">
                    <div class="d-flex justify-content-center flex-column">
                        <div class="row mb-2">
                            <div class="col-4">Status</div>
                            <div class="col-8">{!! $ticket->status_span !!}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Event</div>
                            <div class="col-8">{{ $ticket->orderDetail->order->event->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Ticket</div>
                            <div class="col-8">{{ $ticket->orderDetail->ticket_name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Fullname</div>
                            <div class="col-8">{{ $ticket->orderDetail->buyer_name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Email</div>
                            <div class="col-8">{{ $ticket->orderDetail->buyer_email }}</div>
                        </div>
                        @if ($ticket->status == \App\Enums\Tickets\TicketStatusEnum::Active)
                            <div class="row mb-2 mt-2">
                                <form action="{{ url()->current() . '/update' }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="cs-btn cs-style1 cs-btn_lg w-100 text-center btn-secondary">
                                        <span>Proceed Ticket</span>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="cs-height_95 cs-height_lg_70"> </div>

    @if ($hasAccess)
        @push('page-script')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
                integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                $(function() {
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: "{{ url('/ticket/scan/') . '/' . $ticket->qr_code }}",
                        width: 350,
                        height: 350,
                        // colorDark: "#000000",
                        // colorLight: "#ffffff",
                        // correctLevel: QRCode.CorrectLevel.H
                    });
                })
            </script>
        @endpush
    @endif


@endsection
