<x-admin.app-layout>
    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Menu / Tenant Registration / </span>
                Detail
            </h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url()->current() }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Tenant Detail
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p>Tenant Name</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Tenant Type</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Username</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->username }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Phone</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->phone }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Sheet Number</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->sheet_number }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Price</p>
                        </div>
                        <div class="col-8">
                            <p>: @format_currency($data->price)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Quota</p>
                        </div>
                        <div class="col-8">
                            <p>: @format_number($data->quota)</p>
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
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Tenant Photo
                </h5>
                <div class="card-body">
                    <img src="{{ $data->photo_path }}" alt="" class="img img-responsive">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <form action="{{ url()->current() . '/accept' }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary"><i class='bx bx-check' ></i> &nbsp; Accept Registration</button>
        </form>
    </div>
</x-admin.app-layout>
