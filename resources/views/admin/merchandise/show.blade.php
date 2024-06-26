<x-admin.app-layout>
    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Menu / Merchandise / </span>
                Merchandise Detail
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
                    Merchandise Image
                </h5>
                <div class="card-body">
                    <img src="{{ $data->image_path }}" alt="" class="img img-responsive w-100">
                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Merchandise Thumbnail
                </h5>
                <div class="card-body">
                    <img src="{{ $data->thumbnail_path }}" alt="" class="img img-responsive w-100">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Merchandise Detail
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
                            <p>: {{ $data->merchandiseCategory->name }}</p>
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
                            <p>Price</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->price }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Stock</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->stock }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Status</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->status_text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
