<x-admin.app-layout>

    <form action="{{ url('admin/scanner-officer') }}" method="POST" data-parsley-validate>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Tambah Scanner Officer
                <a href="{{ url('admin/scanner-officer') }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h5>
            <div class="card-body">
                @csrf
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-input label="Name" name="name" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Email" name="email" type="email" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Password" name="password" type="password" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Password Confirmation" name="password_confirmation" type="password" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

</x-admin.app-layout>
