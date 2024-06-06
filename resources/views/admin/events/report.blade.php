<x-admin.app-layout>

    @php
        $currentName = 'Events Report';
        $currentPath = 'dashboard/events';

        $totalSold = 0;
        $totalSales = 0;
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
        </h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Ticket</th>
                            <th>Price</th>
                            <th>Available</th>
                            <th>Sold</th>
                            <th>Sales</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($data) >= 1)
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@format_currency($item->price)</td>
                                    <td>@format_number($item->total_available)</td>
                                    <td>@format_number($item->total_sold)</td>
                                    <td>@format_currency($item->total_sales)</td>
                                </tr>

                                @php
                                    $totalSold += $item->total_sold;
                                    $totalSales += $item->total_sales;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="4">
                                    <b>Total Penjualan Ticket</b>
                                    <br>
                                    <small>(Belum Termasuk Service Fee)</small>
                                </td>
                                <td>@format_number($totalSold)</td>
                                <td>@format_currency($totalSales)</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6">
                                    No data available
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</x-admin.app-layout>
