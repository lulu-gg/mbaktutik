<x-admin.app-layout>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> Scanner Officer</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data Scanner Officer
            <div class="row">
                <div class="col-auto">
                    <a href="{{ url('admin/scanner-officer/create') }}" type="button" class="btn btn-sm btn-primary">
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->getStatusSpan() !!}</td>
                                <td>
                                    <form action="{{ url("admin/scanner-officer/$user->id") }}" method="POST">
                                        <a href="{{ url("admin/scanner-officer/$user->id/edit") }}" class="btn">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ url("admin/scanner-officer/$user->id") }}" class="btn">
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
</x-admin.app-layout>
