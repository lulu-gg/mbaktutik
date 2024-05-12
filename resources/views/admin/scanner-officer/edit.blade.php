<x-admin.app-layout>

    <form action="{{ url("admin/scanner-officer/$data->id") }}" method="POST" data-parsley-validate>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Edit Scanner Officer
                <a href="{{ url('admin/scanner-officer') }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h5>
            <div class="card-body">
                @csrf
                @method('PATCH')
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-input label="Name" name="name" value="{{ $data->name }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Email" name="email" type="email" value="{{ $data->email }}" :readonly=true />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Password" name="password" type="password" information="Kosongkan jika tidak ingin mengubah password" :required=false />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Password Confirmation" name="password_confirmation" type="password" :required=false />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

</x-admin.app-layout>
