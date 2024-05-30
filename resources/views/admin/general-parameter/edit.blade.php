<x-admin.app-layout>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> General Parameter</h4>

    <form action="{{ url('dashboard/general-parameter') }}" method="POST" data-parsley-validate>
        @csrf
        <x-admin.alert-message />

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Website SEO
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="SEO Keyword" name="seo_keyword" value="{{ $data->seo_keyword }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-textarea label="SEO Description" name="seo_description"
                        value="{{ $data->seo_description }}" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Transaciton Setting
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="Transaction Tax" name="transaction_tax"
                        value="{{ $data->transaction_tax }}" type="number" information="in percentage" />
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Contact Information
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <x-admin.form-input label="Phone" name="phone" value="{{ $data->phone }}" />
                        </div>
                        <div class="col">
                            <x-admin.form-input label="Whatsapp URL" name="whatsapp_url"
                                value="{!! $data->whatsapp_url !!}" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Email" name="email" value="{{ $data->email }}" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Location" name="address" value="{{ $data->address }}" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

</x-admin.app-layout>
