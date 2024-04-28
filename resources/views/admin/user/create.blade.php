<x-admin.app-layout>

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Tambah User
            <a href="{{ url('admin/user') }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
        </h5>
        <div class="card-body">
            <form action="{{ url('admin/user') }}" method="POST" data-parsley-validate>
                @csrf
                <x-admin.alert-message />
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="init-select2 form-control" name="role_id" required>
                        @foreach ($roles as $option)
                            <option value="{{ $option->id }}"
                                {{ CustomHelpers::isOptionSelected('role_id', $option->id) }}>
                                {{ $option->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name"
                        value="{{ old('name') }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password"
                        value="{{ old('password') }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" placeholder="Password" name="password_confirmation"
                        value="{{ old('password_confirmation') }}" required />
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-admin.app-layout>
