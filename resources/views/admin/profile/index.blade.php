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
                    @if (\App\Helpers\RoleHelpers::isEventOrganizer())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard/profile/organizer') }}">
                                <i class='bx bx-podcast me-1'></i>
                                Organizer
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <x-admin.alert-message />
                        <form id="formAccountSettings" method="POST">
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
</x-admin.app-layout>
