<x-admin.app-layout>

    <h4 class="fw-bold py-3 mb-3 d-flex justify-content-between align-items-center">
        <div>
            <span class="text-muted fw-light">Menu / Events / </span>
            Assign Ticket Scanner
        </div>
        <a href="{{ url("dashboard/events/$event->id") }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
    </h4>

    <form action="{{ url("dashboard/events/$event->id/scanner") }}" method="POST" data-parsley-validate>
        @csrf
        <x-admin.alert-message />
        <div id="form-container">
            <div class="card mb-3">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Scanner Event : {{ $event->name }}
                    </div>
                </h5>
                <div class="card-body card-ticket-1">
                    <div class="mb-3">
                        <div class="row">
                            <x-admin.form-select label="Scanner Officer" name="user_id" :options=$scanners
                             />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</x-admin.app-layout>
