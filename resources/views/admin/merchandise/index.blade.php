<x-admin.app-layout>

    @php
        $currentName = 'Merchandise';
        $currentPath = 'dashboard/merchandise';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
            <a href="{{ url("$currentPath/create") }}" type="button" class="btn btn-sm btn-primary">
                Tambah Data
            </a>
        </h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table init-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ url("$currentPath/$item->id/edit") }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ url("$currentPath/$item->id") }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin.app-layout>
