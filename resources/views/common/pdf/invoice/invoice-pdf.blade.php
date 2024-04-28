<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        {{ File::get(public_path('assets/kartik-bootstrap/css/bootstrap.min.css')) }}
    </style>
    <title>Invoice {{ $invoice->invoice_number }}</title>

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
    </div>

    <div class="row mt-4">
    </div>

    <div class="row mt-4">
    </div>

</body>

</html>
