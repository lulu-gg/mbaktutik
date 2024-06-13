@php
    $dateNow = now();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        {{ File::get(public_path('assets/kartik-bootstrap/css/bootstrap.min.css')) }}
    </style>
    <title>Ticket Report</title>

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
        <center>
            <h3>Ticket Report</h3>
            @format_date($dateNow)
        </center>
        <div class="mt-4"></div>
        <table class="table table-custom mt-4">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Ticket</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Scanned Date</th>
                    <th>Scanned By</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $i = 1 @endphp
                @foreach ($data as $item)
                    @foreach ($item->orderDetails as $orderDetail)
                        @foreach ($orderDetail->tickets as $ticket)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $ticket->ticket_code }}</td>
                                <td>{{ $orderDetail->buyer_name }}</td>
                                <td>{{ $orderDetail->buyer_email }}</td>
                                <td>{{ $ticket->status_report }}</td>
                                <td>@format_date($ticket->created_at)</td>
                                <td>@format_date($ticket->scanned_at)</td>
                                <td>{{ $ticket->scannedBy?->name ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="mt-4"></div>
        <table class="table table-custom mt-4">
            <thead>
                <tr>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Service Fee</th>
                    <th class="text-center">Handling Fee</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td class="text-center">@format_currency($subtotal)</td>
                    <td class="text-center">@format_currency($serviceFee)</td>
                    <td class="text-center">@format_currency($handlingFee)</td>
                    <td class="text-center">@format_currency($total)</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
