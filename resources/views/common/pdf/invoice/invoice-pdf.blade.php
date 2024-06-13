<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        {{ File::get(public_path('assets/kartik-bootstrap/css/bootstrap.min.css')) }}
    </style>
    <title>Invoice {{ $invoice?->invoice_number }}</title>

    <style>
        .mt-3 {
            margin-top: 0.75rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mt-6 {
            margin-top: 6rem !important;
        }

        .fw-bold {
            font-weight: 700 !important;
        }

        .p-0 {
            padding: 0 !important;
        }

        .td-custom {
            border: 0px !important;
            padding-top: 1px !important;
            padding-bottom: 1px !important;
        }

        .td-item {
            border: 1px solid black !important;
        }

        .text-red {
            color: red;
        }
    </style>

</head>

<body>

    <div class="row">
        <div class="col-xs-7">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/logo-black.png'))) }}"
                alt="" width="200px">
            <p class="mt-4">
                <span class="fw-bold">MBAK TUTIK</span>
                <br>
                <span>{{ $generalParameter->address }}</span>
                <br>
                <span>Phone: {{ $generalParameter->phone }}</span>
                <br>
                <span>
                    Email: <a href="mailto:{{ $generalParameter->email }}">{{ $generalParameter->email }}</a> |
                    Web: <a href="{{ url('/') }}">{{ url('/') }}</a>
                </span>
            </p>
            <p class="mt-5">
                <span class="fw-bold">BILL TO:</span>
                <br>
                <span class="fw-bold">{{ $orderDetail->buyer_name }}</span>
                <br>
                <span>
                    City: {{ $orderDetail->buyer_city }}
                </span>
                <br>
                <span>
                    Phone: {{ $orderDetail->buyer_phone }}
                </span>
                <br>
                <span>
                    Email: {{ $orderDetail->buyer_email }}
                </span>
            </p>
        </div>
        <div class="col-xs-5">
            <table class="table table-custom">
                <tr>
                    <td colspan="2" class="text-center fw-bold td-custom">
                        <h3>INVOICE</h3>
                    </td>
                </tr>
                <tr>
                    <td class="td-custom">Tanggal</td>
                    <td class="td-custom fw-bold">{{ $invoice?->created_at?->format('d-F-Y') }}</td>
                </tr>
                <tr>
                    <td class="td-custom">Invoice</td>
                    <td class="td-custom fw-bold">{{ $invoice?->invoice_number }}</td>
                </tr>
                <tr>
                    <td class="td-custom">Customer</td>
                    <td class="td-custom fw-bold">#{{ $orderDetail->buyer_name }}</td>
                </tr>
                <tr>
                    <td class="td-custom">No Order</td>
                    <td class="td-custom">{{ $invoice?->midtrans_order_id }}</td>
                </tr>
                <tr>
                    <td class="td-custom">Status</td>
                    <td class="td-custom">
                        {{ $invoice?->status_invoice }}
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-xs-12">
            <table class="table table-bordered" style="border-collapse: collapse">
                <tr>
                    <th class="td-item">No</th>
                    <th class="td-item">Event</th>
                    <th class="td-item">Customer</th>
                    <th class="td-item">Email</th>
                    <th class="td-item">Ticket</th>
                    <th class="td-item">Quantity</th>
                    <th class="td-item">Price</th>
                    <th class="td-item">Total</th>
                </tr>
                @foreach ($invoice->order->orderDetails as $item)
                <tr>
                    <td class="td-item">{{ $loop->iteration }}</td>
                    <td class="td-item">{{ $invoice->order->event->name }}</td>
                    <td class="td-item">{{ $item->buyer_name }}</td>
                    <td class="td-item">{{ $item->buyer_email }}</td>
                    <td class="td-item">{{ $item->ticket_name }}</td>
                    <td class="td-item">{{ $item->quantity }}</td>
                    <td class="td-item">@format_currency($item->price)</td>
                    <td class="td-item">@format_currency($item->quantity * $item->price)</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="7" class="text-right fw-bold td-item">SUB TOTAL</td>
                    <td class="td-item">@format_currency($invoice?->subtotal)</td>
                </tr>
                <tr>
                    <td colspan="7" class="text-right fw-bold td-item">Service Fee</td>
                    <td class="td-item">@format_currency($invoice?->fee)</td>
                </tr>
                <tr>
                    <td colspan="7" class="text-right fw-bold td-item">Handling Fee</td>
                    <td class="td-item">@format_currency($invoice?->handling_fee)</td>
                </tr>
                <tr>
                    <td colspan="7" class="text-right fw-bold td-item">TOTAL</td>
                    <td class="td-item">@format_currency($invoice?->total)</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-xs-6">
            <p class="mt-4">
                <span class="fw-bold">Amount In Word</span>
                <br>
                <span class="text-capitalize">{{ $amountStr }}</span>
            </p>
        </div>
        <div class="col-xs-6">
            <div class="mt-4"></div>
            <div class="text-center">
                <h5>{{ $invoice?->created_at?->format('d F Y') }}</h5>
                <div class="mt-5"></div>
                <div class="mt-6"></div>
                <h5>MBAK TUTIK</h5>
            </div>
        </div>
    </div>

</body>

</html>
