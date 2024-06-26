<x-admin.app-layout>
    @php
        $currentName = 'Transaction Report';
        $currentPath = 'dashboard/transaction-report';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
            <div class="row">
                <div class="col-auto">
                    <a href="{{ url()->current() . '/pdf' }}" type="button" target="_blank" class="btn btn-sm btn-danger">
                        Export PDF
                    </a>
                </div>
            </div>
        </h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table init-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>#Invoice</th>
                            <th>Event</th>
                            <th>Amount</th>
                            <th>Service Fee</th>
                            <th>Handling Fee</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ optional($item->invoice)->invoice_number ?? 'N/A' }}</td>
                                <td>{{ $item->event->name }}</td>
                                <td>@format_currency($item->total_amount)</td>
                                <td>@format_currency(optional($item->invoice)->fee ?? 0)</td>
                                <td>@format_currency(optional($item->invoice)->handling_fee ?? 0)</td>
                                <td>{!! $item->status_span !!}</td>
                                <td>@format_date($item->created_at)</td>
                                <td>
                                    <form action="{{ url("$currentPath/$item->id") }}" method="POST">
                                        <a href="{{ url("$currentPath/$item->id/") }}" class="btn">
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</x-admin.app-layout>
