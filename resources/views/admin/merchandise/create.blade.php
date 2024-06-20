<x-admin.app-layout>

    @php
        $currentName = 'Merchandise';
        $currentPath = 'dashboard/merchandise';
    @endphp

    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu / Merchandise /</span> Create Merchandise</h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url($currentPath) }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>
    <form action="{{ url($currentPath) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Images
            </h5>
            <div class="card-body">
                @csrf
                <x-admin.alert-message />
                <div class="mb-3">
                    <label for="images" class="form-label">Upload Images</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Merchandise Detail
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
                        <x-admin.form-input label="Price" name="price" type="number" step="any" />
                    </div>
                    <div class="mb-3 col">
                        <x-admin.form-input label="Stock" name="stock" type="number" />
                    </div>
                    <div class="mb-3 col">
                        <x-admin.form-select label="Status" name="status" :options="$statuses" isSelectArray=true />
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="Description" name="description" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Merchandise Meta
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="SEO" name="seo" />
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="SEO Description" name="seo_description" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</x-admin.app-layout>
