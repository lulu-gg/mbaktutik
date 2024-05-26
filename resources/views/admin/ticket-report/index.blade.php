<x-admin.app-layout>

    @php
        $currentName = 'Ticket Report';
        $currentPath = 'dashboard/ticket-report';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
        </h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table init-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Ticket</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Scanned Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            @foreach ($item->orderDetails as $orderDetail)
                                @foreach ($orderDetail->tickets as $ticket)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $ticket->ticket_code }}</td>
                                        <td>{{ $orderDetail->buyer_name }}</td>
                                        <td>{{ $orderDetail->buyer_email }}</td>
                                        <td>{!! $ticket->getStatusSpanAttribute(true) !!}</td>
                                        <td>@format_date($ticket->created_at)</td>
                                        <td>@format_date($ticket->scanned_at)</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</x-admin.app-layout>
