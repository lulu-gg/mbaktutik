<x-admin.app-layout>

    <h4 class="fw-bold py-3 mb-3 d-flex justify-content-between align-items-center">
        <div>
            <span class="text-muted fw-light">Menu / Events / </span>
            Create Ticket
        </div>
        <a href="{{ url("dashboard/events/$event->id") }}" type="button" class="btn btn-sm btn-secondary">Kembali</a>
    </h4>

    <form action="{{ url("dashboard/events/$event->id/ticket") }}" method="POST" data-parsley-validate>
        @csrf
        <x-admin.alert-message />
        <div id="form-container">
            <div class="card mb-3">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        {{-- Ticket #<span class="counter">1</span> --}}
                        Ticket Event : {{ $event->name }}
                    </div>
                    {{-- <a href="#" type="button" onclick="addTicket()" class="btn btn-sm btn-primary">+</a> --}}
                </h5>
                <div class="card-body card-ticket-1">
                    <div class="mb-3">
                        <x-admin.form-input label="Name" name="name" />
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <x-admin.form-input label="Price" name="price" type="number"
                                    information="Input 0 to set free ticket" />
                            </div>
                            <div class="col">
                                <x-admin.form-input label="Quota" name="quota" type="number" />
                            </div>
                            <div class="col">
                                <x-admin.form-input label="Maximum Purchase User" name="max_user_purchase"
                                    type="number" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <x-admin.form-textarea label="Description" name="description" />
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>

    @push('page-script')
        <script>
            let ticketCount = 1;

            function addTicket() {
                ticketCount++;
                const formContainer = document.getElementById('form-container');
                const clone = formContainer.firstElementChild.cloneNode(true);
                clone.querySelector('.counter').innerText = ticketCount;
                clone.querySelector('.card-body').classList.remove('card-ticket-1');
                clone.querySelector('.card-body').classList.add(`card-ticket-${ticketCount}`);
                clone.querySelectorAll('input, textarea').forEach(input => {
                    input.value = '';
                });
                formContainer.appendChild(clone);
            }
        </script>
    @endpush

</x-admin.app-layout>
