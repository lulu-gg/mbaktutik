<x-admin.app-layout>
    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Menu / Events / </span>
                Event Detail
            </h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url()->current() . '/edit' }}" type="button" class="btn btn-sm btn-primary">Edit</a>
                <a href="{{ url()->current() }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-8 mb-4">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Event Banner
                </h5>
                <div class="card-body">
                    <img src="{{ $data->banner_path }}" alt="" class="img img-responsive w-100">
                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Event Thumbnail
                </h5>
                <div class="card-body">
                    <img src="{{ $data->thumbnail_path }}" alt="" class="img img-responsive w-100">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Event Detail
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p>Name</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Category</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->eventsCategory->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Start Date</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ CustomHelpers::formatDate($data->start_date) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>End Date</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ CustomHelpers::formatDate($data->end_date) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Description</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Term & Condition</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->tnc }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>SEO</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->seo }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>SEO Description</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->seo_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Event Location
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>Location</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->location }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Province</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->province }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>City</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->city }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>ZIP</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->zip }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Latitude</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->latitude }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Longitude</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->longitude }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Ticket Variant
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ url()->current() . '/ticket/create' }}" type="button"
                                class="btn btn-sm btn-primary">
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
                                    <th class="col-1">Price</th>
                                    <th class="col-1">Quota</th>
                                    <th class="col-1">Max Purchase</th>
                                    <th>Status</th>
                                    <th class="col-3">Desc</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($data->ticketVariations as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quota }}</td>
                                        <td>{{ $item->max_user_purchase }}</td>
                                        <td>{{ \App\Enums\Events\EventStatusEnum::getKey($item->status) }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <form action="{{ url("admin/events/$data->id/ticket/$item->id") }}"
                                                method="POST">
                                                <a href="{{ url("admin/events/$data->id/ticket/$item->id/edit") }}"
                                                    class="btn">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="{{ url("admin/events/$data->id/ticket/$item->id/") }}"
                                                    class="btn">
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
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Scanner Job
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ url()->current() . '/scanner/create' }}" type="button"
                                class="btn btn-sm btn-primary">
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
                                    <th class="text-center col-1">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($data->eventsScannerJob as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>
                                            <form action="{{ url("admin/events/$data->id/scanner/$item->id") }}"
                                                method="POST">
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
        </div>
    </div>
</x-admin.app-layout>
