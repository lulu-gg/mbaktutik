<x-admin.app-layout>
    @php
        $currentName = 'Merchandise Category';
        $currentPath = 'dashboard/merchandise-category';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
            @if (\App\Helpers\RoleHelpers::isAdmin())
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ url("$currentPath/create") }}" type="button" class="btn btn-sm btn-primary">
                            Tambah Data
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
                            <th>Name</th>
                            <th>Description</th>
                            @if (\App\Helpers\RoleHelpers::isAdmin())
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                @if (\App\Helpers\RoleHelpers::isAdmin())
                                    <td>
                                        <form action="{{ url("$currentPath/$category->id") }}" method="POST">
                                            <a href="{{ url("$currentPath/$category->id/edit") }}" class="btn">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-delete">
                                                <i class="bx bx-trash"></i>
                                            </button>
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
                $('.btn-delete').on('click', function() {
                    if (confirm('Are you sure you want to delete this item?')) {
                        $(this).closest('form').submit();
                    }
                });
            });
        </script>
    @endsection

</x-admin.app-layout>
