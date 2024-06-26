<x-admin.app-layout>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile Setting /</span> Security</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
                            <i class="bx bx-user me-1"></i>
                            Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/profile/security') }}">
                            <i class="bx bx-lock-alt me-1"></i>
                            Security
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/profile/organizer') }}">
                            <i class='bx bx-podcast me-1'></i>
                            Organizer
                        </a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <x-admin.alert-message />
                        <form id="formAccountSettings" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ $data->photo_path }}" alt="user-avatar" class="d-block rounded"
                                        height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden
                                                accept="image/png, image/jpeg" name="photo" />
                                        </label>
                                        <button type="button"
                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                        <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 2MB</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0 mb-4" />
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <x-admin.form-input label="Name" name="name" value="{{ $data->name }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <x-admin.form-input label="Role" name="role_id" value="{{ $data->role->name }}"
                                        readonly />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <x-admin.form-input label="E-Mail" name="email" value="{{ $data->email }}"
                                        readonly />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <x-admin.form-input label="Joined at" name="created_at"
                                        value="{{ $data->created_at->format('M d Y,  h:i a') }}" readonly />
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>

    @push('page-script')
        <script>
            let e = document.getElementById("uploadedAvatar");
            const l = document.querySelector(".account-file-input")
            const c = document.querySelector(".account-image-reset");
            if (e) {
                const r = e.src;
                (l.onchange = () => {
                    l.files[0] && (e.src = window.URL.createObjectURL(l.files[0]));
                }),
                (c.onclick = () => {
                    (l.value = ""), (e.src = r);
                });
            }
        </script>
    @endpush
</x-admin.app-layout>
