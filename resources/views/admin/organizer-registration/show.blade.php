<x-admin.app-layout>
    <div class="row">
        <div class="col">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Menu / Event Organizer Registration / </span>
                Detail
            </h4>
        </div>
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">
                <a href="{{ url()->current() }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h4>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Event Organizer Detail
                </h5>
                <div class="card-body">
                    <div class="row mb-4 mt-4">
                        <div class="col-4">
                            <p>Logo</p>
                        </div>
                        <div class="col-8">
                            <img src="{{ $data->logo_path }}" alt="" class="img img-responsive w-25">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Company Name</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->company_name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Username</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->username }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Email</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->contact_person }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Phone</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->phone }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>About</p>
                        </div>
                        <div class="col-8">
                            <p>: {{ $data->about_us }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Proposal</p>
                        </div>
                        <div class="col-8">
                            <a href="{{ $data->proposal_path }}" class="btn btn-primary btn-sm"><i class='bx bxs-file-pdf'></i> &nbsp; View Document</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Event Organizer Location
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>Province</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->province }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>City</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->city }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>ZIP</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->zip }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Address</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $data->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <form action="{{ url()->current() . '/accept' }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary"><i class='bx bx-check' ></i> &nbsp; Accept Registration</button>
        </form>
    </div>
</x-admin.app-layout>
