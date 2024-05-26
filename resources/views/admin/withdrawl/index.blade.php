<x-admin.app-layout>

    @php
        $currentName = 'Withdrawl';
        $currentPath = 'dashboard/withdrawl';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
            @if (\App\Helpers\RoleHelpers::isEventOrganizer())
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ url("$currentPath/create") }}" type="button" class="btn btn-sm btn-primary">
                            Request Withdrawl
                        </a>
                    </div>
                </div>
            @endif
        </h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table init-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            @if (\App\Helpers\RoleHelpers::isAdmin())
                                <th>EO</th>
                            @endif
                            <th>Bank</th>
                            <th>Account</th>
                            <th>Holder</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Paid Date</th>
                            @if (\App\Helpers\RoleHelpers::isAdmin())
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                @if (\App\Helpers\RoleHelpers::isAdmin())
                                    <td>{{ $item->organizer->company_name }}</td>
                                @endif
                                <td>{{ $item->beneficiary_bank }}</td>
                                <td>{{ $item->beneficiary_name }}</td>
                                <td>{{ $item->beneficiary_account }}</td>
                                <td>@format_currency($item->amount)</td>
                                <td>{!! $item->status_span !!}</td>
                                <td>@format_date($item->created_at)</td>
                                <td>@format_date($item->paid_at)</td>
                                @if (\App\Helpers\RoleHelpers::isAdmin())
                                    <td>
                                        <form action="{{ url("$currentPath/$item->id") }}" method="POST">
                                            <a href="{{ url("$currentPath/$item->id/") }}" class="btn">
                                                <i class="bx bx-right-arrow-alt"></i>
                                            </a>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    @section('page-script')
        <script>
            $(function() {
                $('#filter_status').change(function() {
                    window.location.href = `{{ url('dashboard/user?q=') }}${this.value}`
                })
            })
        </script>
    @endsection

</x-admin.app-layout>
