<x-admin.app-layout>

    @php
        $currentName = 'Events';
        $currentPath = "dashboard/events/";
    @endphp

    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu / Events /</span> Edit Event</h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>
    <form action="{{ url($currentPath . $data->slug) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Banner & Thumbnail
            </h5>
            <div class="card-body">
                @csrf
                @method('PATCH')
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Banner" name="banner" value="{{ $data->banner_path }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-image-upload label="Upload Thumbnail" name="thumbnail" value="{{ $data->thumbnail_path }}" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Event Detail
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="Event Name" name="name" value="{{ $data->name }}" />
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <x-admin.form-select label="Category" name="event_category_id" :options=$categorys value="{{ $data->event_category_id}}" />
                    </div>
                    <div class="mb-3 col">
                        <x-admin.form-select label="Status" name="status" :options=$statuses isSelectArray=true value="{{ $data->status}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <x-admin.form-flatpickr label="Start Date" name="start_date" withTime=true value="{{ $data->start_date }}" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <x-admin.form-flatpickr label="End Date" name="end_date" withTime=true value="{{ $data->end_date }}" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="Description" name="description" value="{{ $data->description }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="Term & Condition" name="tnc" value="{{ $data->tnc }}" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Event Location
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="Location" name="location" value="{{ $data->location }}" />
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <x-admin.form-input label="Province" name="province" value="{{ $data->province }}" />
                    </div>
                    <div class="col mb-3">
                        <x-admin.form-input label="City" name="city" value="{{ $data->city }}" />
                    </div>
                    <div class="col mb-3">
                        <x-admin.form-input label="ZIP" name="zip" value="{{ $data->zip }}" type="number" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <x-admin.form-input label="Latitude" name="latitude" value="{{ $data->latitude }}" type="number" />
                    </div>
                    <div class="col mb-3">
                        <x-admin.form-input label="Longitude" name="longitude" value="{{ $data->longitude }}" type="number" />
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Event Meta
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="SEO" name="seo" value="{{ $data->seo }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="SEO Description" name="seo_description" value="{{ $data->seo_description }}" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</x-admin.app-layout>
