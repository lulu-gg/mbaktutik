<x-admin.app-layout>

    @php
        $currentName = 'Events Category';
        $currentPath = 'admin/sponsors';
    @endphp

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Edit {{ $currentName }}
            <a href="{{ url($currentPath) }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
        </h5>
        <div class="card-body">
            <form action="{{ url("$currentPath/$data->id") }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate>
                @csrf
                @method('PATCH')
                <x-admin.alert-message />
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name"
                        value="{{ $data->name ?? old('name') }}" required />
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Display Order</label>
                        <select class="init-select2 form-control" name="display_order" required>
                            <option></option>
                            @foreach ($availableDisplayOrder as $option)
                                <option value="{{ $option }}"
                                    {{ CustomHelpers::isOptionSelected('display_order', $option, $data->display_order) }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Status</label>
                        <select class="init-select2 form-control" name="status" required>
                            <option></option>
                            @foreach (\App\Enums\Sponsors\SponsorStatusEnum::asSelectArray() as $key => $val)
                                <option value="{{ $key }}"
                                    {{ CustomHelpers::isOptionSelected('status', $key, $data->status) }}>
                                    {{ $val }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-image-upload label="Logo" name="logo" value="{{ $data->image_path }}" />
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-admin.app-layout>
