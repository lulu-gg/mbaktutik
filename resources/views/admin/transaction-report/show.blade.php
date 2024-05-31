<x-admin.app-layout>
    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Menu / Transaction Report / </span>
                Detail
            </h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Transaction Detail
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p>Event</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->event->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Event Category</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->event->eventsCategory->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Order Date</p>
                        </div>
                        <div class="col-8">
                            <p>: @format_date($data->created_at)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Invoice No</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->invoice->invoice_number }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Midtrans Order ID</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->invoice->midtrans_order_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-8">
                            <p>: @format_currency($data->invoice->subtotal)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Fee</p>
                        </div>
                        <div class="col-8">
                            <p>: @format_currency($data->invoice->fee)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Total</p>
                        </div>
                        <div class="col-8">
                            <p>: @format_currency($data->total_amount)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Status</p>
                        </div>
                        <div class="col-8">
                            <p>: {!! $data->status_span !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Invoice</p>
                        </div>
                        <div class="col-8">
                            <p>: <a href="{{ url()->current() . '/invoice' }}" class="btn btn-sm btn-primary"
                                    target="_blank">{{ $data->invoice->invoice_number }}.pdf</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            @foreach ($data->orderDetails as $detail)
                <div class="card mb-2">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Ticket #{{ $loop->iteration }}
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <p>Name</p>
                            </div>
                            <div class="col-9">
                                <p>: {{ $detail->buyer_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Email</p>
                            </div>
                            <div class="col-9">
                                <p>: {{ $detail->buyer_email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Phone</p>
                            </div>
                            <div class="col-9">
                                <p>: {{ $detail->buyer_phone }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>City</p>
                            </div>
                            <div class="col-9">
                                <p>: {{ $detail->buyer_city }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Quantity</p>
                            </div>
                            <div class="col-9">
                                <p>: @format_number($detail->quantity)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Price</p>
                            </div>
                            <div class="col-9">
                                <p>: @format_currency($detail->price)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Total</p>
                            </div>
                            <div class="col-9">
                                <p>: @format_currency($detail->total)</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin.app-layout>
