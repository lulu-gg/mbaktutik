<x-admin.app-layout>

    @php
        $currentName = 'Events';
        $currentPath = 'dashboard/events';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
            <div class="row">
                <div class="col-auto">
                    <a href="{{ url("$currentPath/create") }}" type="button" class="btn btn-sm btn-primary">
                        Tambah Data
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
                            <th>Title</th>
                            <th>Kategori</th>
                            <th>Ticket</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->eventsCategory->name }}</td>
                                <td>{{ $item->ticket_variations_count }}</td>
                                <td>{{ \App\Enums\Events\EventStatusEnum::getKey($item->status) }}</td>
                                <td>
                                    <form action="{{ url("$currentPath/$item->slug") }}" method="POST">
                                        <a href="{{ url("$currentPath/$item->slug/edit") }}" class="btn">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ url("$currentPath/$item->slug/") }}" class="btn">
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-delete">
                                            <i class="bx bx-trash"></i>
                                        </button>
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
