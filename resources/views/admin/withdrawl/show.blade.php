<x-admin.app-layout>

    @php
        $currentName = 'Withdrawl Detail';
        $currentPath = 'dashboard/withdrawl';
    @endphp

    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Withdrawl Request Detail
            <a href="{{ url($currentPath) }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
        </h5>
        <div class="card-body">
            <div class="mb-3">
                <x-admin.form-input label="Status" name="status"
                    value="{{ \App\Enums\Withdrawl\WithdrawlStatusEnum::fromValue($data->status)->description }}"
                    readonly />
            </div>
            <div class="mb-3">
                <x-admin.form-input label="Bank Name" name="beneficiary_bank" value="{{ $data->beneficiary_bank }}"
                    readonly />
            </div>
            <div class="mb-3">
                <x-admin.form-input label="Account Number" name="beneficiary_account"
                    value="{{ $data->beneficiary_account }}" readonly />
            </div>
            <div class="mb-3">
                <x-admin.form-input label="Account Name" name="beneficiary_name" value="{{ $data->beneficiary_name }}"
                    readonly />
            </div>
            <div class="mb-3">
                <x-admin.form-input label="Amount" name="amount"
                    value="{{ number_format($data->amount, 0, ',', '.') }}" readonly />
            </div>
            <div class="mb-3">
                <x-admin.form-textarea label="Notes" name="notes" value="{{ $data->notes }}" :required=false
                    readonly />
            </div>
            @if ($data->status == \App\Enums\Withdrawl\WithdrawlStatusEnum::Pending)
                <div class="mt-2">
                    <div class="row">
                        <div class="col-auto">
                            <form action="{{ url()->current() . '/accept' }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form>
                        </div>
                        <div class="col-auto">
                            <form action="{{ url()->current() . '/reject' }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-admin.app-layout>
