<x-admin.app-layout>

    @php
        $currentName = 'Sponsors';
        $currentPath = 'admin/sponsors';
    @endphp

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Tambah {{ $currentName }}
            <a href="{{ url($currentPath) }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
        </h5>
        <div class="card-body">
            <form action="{{ url($currentPath) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                @csrf
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-input label="Name" name="name" />
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Display Order</label>
                        <select class="init-select2 form-control" name="display_order" required>
                            <option></option>
                            @foreach ($availableDisplayOrder as $option)
                                <option value="{{ $option }}"
                                    {{ CustomHelpers::isOptionSelected('display_order', $option) }}>
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
                                    {{ CustomHelpers::isOptionSelected('status', $key) }}>
                                    {{ $val }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-image-upload label="Logo" name="logo" />
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-admin.app-layout>
