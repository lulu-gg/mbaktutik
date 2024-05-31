<x-admin.app-layout>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / User / </span> Event Organizer</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data Event Organizer
        </h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table init-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Join Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>@format_date($user->created_at)</td>
                                <td>{!! $user->getStatusSpan() !!}</td>
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
