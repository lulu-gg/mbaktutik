<x-admin.app-layout>

    <form action="{{ url('admin/user') }}" method="POST" data-parsley-validate>

        <div class="card mb-4">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Tambah User
                <a href="{{ url('admin/user') }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
            </h5>
            <div class="card-body">
                @csrf
                <x-admin.alert-message />
                <div class="mb-3">
                    <x-admin.form-select label="Role" name="role_id" :options=$roles />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Name" name="name" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Email" name="email" type="email" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Password" name="password" type="password" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Password Confirmation" name="password_confirmation" type="password" />
                </div>
            </div>
        </div>

        <div class="mb-4 card card-event-organizer d-none">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Event Organizer Detail
            </h5>
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.form-input label="Company Name" name="company_name" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Contact Person" name="contact_person" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Phone" name="phone" />
                </div>
                <div class="mb-3">
                    <x-admin.form-input label="Website" name="website" />
                </div>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

    @push('page-script')
        <script>
            $(function() {
                $('#xid-role_id').change(function() {
                    if (this.value != 2) {
                        $("#xid-role_id").removeAttr("required");
                        $("#xid-company_name").removeAttr("required");
                        $("#xid-contact_person").removeAttr("required");
                        $("#xid-phone").removeAttr("required");
                        $("#xid-website").removeAttr("required");
                        $('.card-event-organizer').addClass("d-none");
                        return;
                    }

                    $("#xid-role_id").attr("required", "required");
                    $("#xid-company_name").attr("required", "required");
                    $("#xid-contact_person").attr("required", "required");
                    $("#xid-phone").attr("required", "required");
                    $("#xid-website").attr("required", "required");

                    $('.card-event-organizer').removeClass("d-none");
                })
            })
        </script>
    @endpush

</x-admin.app-layout>
