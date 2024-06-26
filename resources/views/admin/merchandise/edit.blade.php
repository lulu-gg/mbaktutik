<x-admin.app-layout>
    @php
        $currentName = 'Merchandise';
        $currentPath = 'dashboard/merchandise';
    @endphp

    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu / Merchandise /</span> Edit Merchandise</h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>

    <form action="{{ url($currentPath . '/' . $data->slug) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Banner & Thumbnail
            </h5>
            <div class="card-body">
                @csrf
                @method('PATCH')
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Banner" name="banner" value="{{ $data->banner }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Thumbnail" name="thumbnail" value="{{ $data->thumbnail }}" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Merchandise Detail
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="Merchandise Name" name="name" value="{{ $data->name }}" />
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <x-admin.form-select label="Category" name="merchandise_category_id" :options="$categories" value="{{ $data->merchandise_category_id }}" />
                    </div>
                    <div class="mb-3 col">
                        <x-admin.form-select label="Status" name="status" :options="$statuses" isSelectArray=true value="{{ $data->status }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <x-admin.form-input label="Price" name="price" type="number" step="any" value="{{ $data->price }}" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <x-admin.form-input label="Stock" name="stock" type="number" value="{{ $data->stock }}" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="Description" name="description" value="{{ $data->description }}" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</x-admin.app-layout>
