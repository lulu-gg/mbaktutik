<x-admin.app-layout>

    @php
        $currentName = 'Sponsors';
        $currentPath = 'dashboard/sponsors';
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Display Order</th>
                            <th class="col-3">Logo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ \App\Enums\Sponsors\SponsorStatusEnum::getKey($item->status) }}</td>
                                <td>{{ $item->display_order }}</td>
                                <td>
                                    <img src="{{ $item->image_path }}" alt="" class="img img-fluid"
                                        style="width: 15rem">
                                </td>
                                <td>
                                    <form action="{{ url("$currentPath/$item->id") }}" method="POST">
                                        <a href="{{ url("$currentPath/$item->id/edit") }}" class="btn">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ url("$currentPath/$item->id/") }}" class="btn">
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
