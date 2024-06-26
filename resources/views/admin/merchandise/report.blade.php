<x-admin.app-layout>
    @php
        $currentName = 'Merchandise Report';
        $currentPath = 'dashboard/merchandise';

        // Dummy data for demonstration
        $totalSold = 100;
        $totalSales = 50000;
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

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
                            <th>Name</th>
                            <th>Total Sold</th>
                            <th>Total Sales</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $totalSold }}</td>
                                <td>{{ $totalSales }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.app-layout>
