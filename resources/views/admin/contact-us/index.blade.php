<x-admin.app-layout>

    @php
        $currentName = 'Contact US';
        $currentPath = 'dashboard/contact-us';
    @endphp

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu /</span> {{ $currentName }}</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Data {{ $currentName }}
        </h5>
        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table init-datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>WhatsApp</th>
                            <th>Subject</th>
                            <th class="col-3">Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->whatsapp }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->message }}</td>
                                <td>@format_date($item->created_at)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</x-admin.app-layout>
