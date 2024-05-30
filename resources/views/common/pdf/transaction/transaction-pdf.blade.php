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
    <title>Transaction Report</title>

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
            <h3>Transaction Report</h3>
            @format_date($dateNow)
        </center>
        <div class="mt-4"></div>
        <table class="table table-custom mt-4">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>#Invoice</th>
                    <th>Event</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->invoice->invoice_number }}</td>
                        <td>{{ $item->event->name }}</td>
                        <td>@format_currency($item->total_amount)</td>
                        <td>{{ $item->status_report }}</td>
                        <td>@format_date($item->created_at)</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
