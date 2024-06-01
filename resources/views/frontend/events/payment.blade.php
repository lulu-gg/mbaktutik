@extends('frontend.layout.main')
@section('title', 'Events Detail')
@section('content')
    <div class="cs-height_90 cs-height_lg_80"></div>
    <section class="cs-page_head cs-bg" data-src="{{ asset('frontend/assets/img/page_head_bg.svg') }}">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">Payment Event Tickets</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/events/detail/{{ $event->slug }}">Events</a></li>
                    <li class="breadcrumb-item active">Payment</li>
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
                                <div class="col-9">@format_currency($invoice->subtotal)</div>
                                <div class="col-3 mb-3">Service Fee</div>
                                <div class="col-9">@format_currency($invoice->fee)</div>
                                <div class="col-3 mb-3">Total</div>
                                <div class="col-9">@format_currency($invoice->total)</div>
                                <div class="col-3 mb-3">Payment Status</div>
                                <div class="col-9">
                                    {!! $invoice->status_span !!}
                                </div>
                                <div class="col-3 mb-3">Invoice</div>
                                <div class="col-9">
                                   <a href="{{ url()->current() . '/invoice' }}" target="_blank" class="btn btn-sm btn-primary">{{ $invoice->invoice_number }}.pdf</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($invoice->status == \App\Enums\Invoice\InvoiceStatusEnum::Pending)
                        <button type="button" class="cs-btn cs-style1 cs-btn_lg w-100 text-center paynow">
                            <span>Pay Now</span>
                        </button>
                    @endif
                </div>
                @if ($invoice->status == \App\Enums\Invoice\InvoiceStatusEnum::Done)
                    <div class="cs-height_0 cs-height_lg_40"></div>
                    <div class="cs-single_product_head">
                        <h2>Your Tickets</h2>
                        <ul class="cs-activity_list cs-mp0">
                            @foreach ($invoice->order->orderDetails as $detail)
                                @foreach ($detail->tickets as $ticket)
                                    <li style="cursor: pointer" onclick="openTicketPage('{{ $ticket->qr_code }}')">
                                        <div class="cs-activity cs-white_bg cs-type1">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <div class="cs-activity_right">
                                                    <p class="cs-activity_text">
                                                        {{-- {{ $ticket->orderDetail->ticket_name }} --}}
                                                        {{ $ticket->ticket_code }}
                                                    </p>
                                                    <p class="cs-activity_posted_by">
                                                        {{ $ticket->orderDetail->ticket_name }} |
                                                        {{ $ticket->orderDetail->buyer_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            {!! $ticket->status_span !!}
                                        </div>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="cs-height_0 cs-height_lg_40"></div>
                <div class="cs-single_product_head">
                    <h2>Personal Information</h2>
                    <div class="mt-2 ml-2">
                        @foreach ($invoice->order->orderDetails as $item)
                            <div class="cs-activity cs-white_bg billing-info mb-4">
                                <div class="row">
                                    <div class="col-2 mb-2">Fullname</div>
                                    <div class="col-10">{{ $item->buyer_name }}</div>
                                    <div class="col-2 mb-2">Email</div>
                                    <div class="col-10">{{ $item->buyer_email }}</div>
                                    <div class="col-2 mb-2">Phone</div>
                                    <div class="col-10">{{ $item->buyer_phone }}</div>
                                    <div class="col-2 mb-2">NIK</div>
                                    <div class="col-10">{{ $item->buyer_nik }}</div>
                                    <div class="col-2 mb-2">City</div>
                                    <div class="col-10">{{ $item->buyer_city }}</div>
                                    <div class="col-2 mb-2">Ticket</div>
                                    <div class="col-10">{{ $item->ticket_name }}</div>
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

    @if ($invoice->status == \App\Enums\Invoice\InvoiceStatusEnum::Pending)
        @include('common.assets.js.midtrans-script')

        @push('page-script')
            <script>
                let mtSnapToken = '{{ $invoice->midtrans_snap_token }}'

                $(function() {
                    $('.paynow').click(showSnap)

                    showSnap();
                })

                function showSnap() {
                    window.snap.pay(mtSnapToken, {
                        onSuccess: function(result) {
                            Swal.fire(
                                'Success',
                                'Terimakasih telah menyelesaikan transaksi anda',
                                'success'
                            )

                            setTimeout(function() {
                                location.reload()
                            }, 1000);
                        },
                        onPending: function(result) {
                            Swal.fire(
                                'Pending',
                                'Segera selesaikan pembayaran anda!',
                                'info'
                            )
                        },
                        onError: function(result) {
                            Swal.fire(
                                'Oops...',
                                'Terjadi kesalahan saat, coba lagi nanti',
                                'error',
                            )
                        },
                    })
                }
            </script>
        @endpush
    @endif

    @if ($invoice->status == \App\Enums\Invoice\InvoiceStatusEnum::Done)
        @push('page-script')
            <script>
                function openTicketPage(qr) {
                    location.href = `{{ url('/ticket/') }}/${qr}`;
                }
            </script>
        @endpush
    @endif

@endsection
