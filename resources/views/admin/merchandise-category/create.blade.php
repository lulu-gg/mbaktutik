<x-admin.app-layout>

    @php
        $currentName = 'Merchandise Category';
        $currentPath = 'dashboard/merchandise-category';
    @endphp

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Tambah {{ $currentName }}
            <a href="{{ url($currentPath) }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
        </h5>
        <div class="card-body">
            <form action="{{ url($currentPath) }}" method="POST" data-parsley-validate>
                @csrf
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-input label="Name" name="name" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Description" name="description" />
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-admin.app-layout>
