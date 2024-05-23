@extends('frontend.layout.main')
@section('title', 'Events Detail')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Event Tickets</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Ticket</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="cs-height_50 cs-height_lg_70"></div>
    <div class="d-flex justify-content-center align-item-center">
        <div class="cs-activity cs-white_bg billing-info mb-4">
            <div class="d-flex justify-content-center flex-column">
                <div id="qrcode"></div>
                <h4 class="text-center mt-4 m-0">{{ $ticket->ticket_code }}</h4>
            </div>
        </div>
    </div>
    <div class="cs-height_95 cs-height_lg_70"></div>

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


@endsection
