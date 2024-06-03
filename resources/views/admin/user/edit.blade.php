<x-admin.app-layout>


    <div class="card mb-4">
        <h5 class="card-header">Account Details</h5>
        <div class="card-body">
            <form action="{{ url('/dashboard/user/admin/' . $user->id) }}" method="POST">
                <div class="row">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Full Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Full name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Email</label>
                        <input class="form-control" type="email" value="{{ $user->email }}" placeholder="Email"
                            readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Joined Date</label>
                        <input class="form-control" type="text" value="@format_date($user->created_at)"readonly>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>

</x-admin.app-layout>
