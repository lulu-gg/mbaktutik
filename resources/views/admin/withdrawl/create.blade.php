<x-admin.app-layout>

    @php
        $currentName = 'Withdrawl';
        $currentPath = 'dashboard/withdrawl';
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
                    <x-admin.form-input label="Bank Name" name="beneficiary_bank" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Account Number" name="beneficiary_account" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Account Name" name="beneficiary_name" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Amount" name="amount" type="number" />
                    <small class="fw-light">Availbale Balance : @format_currency($balance)</small>
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="Notes" name="notes" :required=false />
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Request</button>
                </div>
            </form>
        </div>
    </div>

</x-admin.app-layout>
