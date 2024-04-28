<x-admin.app-layout>


    <div class="card mb-4">
        <h5 class="card-header">Account Details</h5>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Full Name</label>
                    <input class="form-control" type="text" name="fullname" placeholder="Full name"
                        value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Email</label>
                    <input class="form-control" type="email" value="{{ $user->email }}" placeholder="Email" readonly>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Joined Date</label>
                    <input class="form-control" type="text" value="@format_date($user->created_at)"readonly>
                </div>
            </div>
        </div>
    </div>

</x-admin.app-layout>
