<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">

            <h3 class="mb-4">
                @if ($isCreate) Create @endif
                @if ($isEdit) Edit @endif
                {{ $title ?: $page }}
            </h3>
            {{-- <p class="text-subtitle text-muted">
                A sortable, searchable, paginated table without dependencies
                thanks to simple-datatables.
            </p> --}}
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Dashboard
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $page }}
                    </li>
                    @if ($isCreate)
                        <li class="breadcrumb-item active" aria-current="page">
                            Create
                        </li>
                    @endif
                    @if ($isEdit)
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit
                        </li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>
</div>
