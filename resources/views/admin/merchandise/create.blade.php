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
        @csrf
        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Images
            </h5>
            <div class="card-body">
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Images" name="images[]" multiple />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Merchandise Detail
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="mb-2">Merchandise Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="merchandise_category_id" class="mb-2">Category</label>
                        <select class="form-control @error('merchandise_category_id') is-invalid @enderror" name="merchandise_category_id" id="merchandise_category_id" required>
                            <option selected disabled></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('merchandise_category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="status" class="mb-2">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required>
                            <option selected disabled></option>
                            @foreach($statuses as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="mb-2">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="mb-2">Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" required>
                    @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="mb-2">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Merchandise Meta
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="seo" class="mb-2">SEO</label>
                    <input type="text" class="form-control @error('seo') is-invalid @enderror" name="seo" id="seo">
                    @error('seo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="seo_description" class="mb-2">SEO Description</label>
                    <textarea class="form-control @error('seo_description') is-invalid @enderror" name="seo_description" id="seo_description"></textarea>
                    @error('seo_description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</x-admin.app-layout>
