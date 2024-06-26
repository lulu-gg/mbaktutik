<x-admin.app-layout>
    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu / Merchandise / </span> Create Merchandise</h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url('dashboard/merchandise') }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>
    <form action="{{ url('dashboard/merchandise') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Merchandise Details
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="Merchandise Name" name="name" />
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <x-admin.form-select label="Category" name="merchandise_category_id" :options="$categories" />
                    </div>
                    <div class="mb-3 col">
                        <x-admin.form-select label="Status" name="status" :options="$statuses" isSelectArray=true />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <x-admin.form-input label="Price" name="price" type="number" step="any" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <x-admin.form-input label="Stock" name="stock" type="number" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="Description" name="description" />
                </div>
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Thumbnail" name="thumbnail" />
                </div>
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Image" name="image" />
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</x-admin.app-layout>
