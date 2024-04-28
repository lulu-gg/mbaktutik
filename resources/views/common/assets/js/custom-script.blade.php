<script>
    $.fn.fileinputBsVersion = '5.2.3';

    // CUSTOM JS
    $(function() {
        // INIT DATATTABLE
        $(".init-datatable").each(function(i, obj) {
            $(obj).DataTable();
        });

        $(".init-datatable-responsive").each(function(i, obj) {
            $(obj).DataTable({
                responsive: true
            });
        });

        // INIT TIMEPICKER
        $(".flatpicker-datetime").each(function(i, obj) {
            obj.flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
            });
        });

        // INIT SELECT2
        $(".init-select2").select2({
            allowClear: true,
            placeholder: "Select option",
        });

        // INIT SELECT2 for city
        $(".select-city").select2({
            allowClear: true,
            placeholder: "Select City",
            ajax: {
                url: `{{ url('api/cities') }}/`,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                delay: 250,
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: data.data
                    };
                },
                templateResult: function(dataRow) {
                    return dataRow.username;
                },
                templateSelection: function(dataRow) {
                    return dataRow.username;
                },
                cache: true
            }
        });

        // INIT NUMBER SPARATOR
        if ($(".init-number-sparator").length) {
            // cleverjs error when no element
            $(".init-number-sparator").each(function(i, obj) {
                new Cleave(obj, {
                    numeral: true,
                    numeralThousandsGroupStyle: "thousand",
                    swapHiddenInput: true,
                    rawValueTrimPrefix: true,
                });
            });
        }

        // INIT CURRENCY SPARATOR
        if ($(".init-currency-sparator").length) {
            // cleverjs error when no element
            $(".init-currency-sparator").each(function(i, obj) {
                new Cleave(obj, {
                    numeral: true,
                    numeralThousandsGroupStyle: "thousand",
                    swapHiddenInput: true,
                    prefix: "Rp ",
                    signBeforePrefix: true,
                    rawValueTrimPrefix: true,
                });
            });
        }

        // INIT PHONE NUMBER
        if ($(".init-phone-number").length) {
            // cleverjs error when no element
            $(".init-phone-number").each(function(i, obj) {
                new Cleave(obj, {
                    // phone: true,
                    // phoneRegionCode: 'ID'
                    // prefix: "62",
                    blocks: [4, 4, 4, 6],
                    swapHiddenInput: true,
                    // signBeforePrefix: true,
                    // noImmediatePrefix: true
                });
            });
        }

        if ($(".init-kilogram-number").length) {
            // cleverjs error when no element
            $(".init-kilogram-number").each(function(i, obj) {
                // INIT KILOGRAM NUMBER
                new Cleave(obj, {
                    numeral: true,
                    prefix: " KG",
                    tailPrefix: true,
                    swapHiddenInput: true,
                    signBeforePrefix: true,
                    rawValueTrimPrefix: true,
                    noImmediatePrefix: true,
                });
            });
        }

        if ($(".init-ton-number").length) {
            // cleverjs error when no element
            $(".init-ton-number").each(function(i, obj) {
                // INIT TON NUMBER
                new Cleave(obj, {
                    numeral: true,
                    prefix: " t",
                    tailPrefix: true,
                    swapHiddenInput: true,
                    signBeforePrefix: true,
                    rawValueTrimPrefix: true,
                    noImmediatePrefix: true,
                });
            });
        }

        if ($(".init-meter-number").length) {
            // cleverjs error when no element
            $(".init-meter-number").each(function(i, obj) {
                // INIT METER NUMBER
                new Cleave(obj, {
                    numeral: true,
                    prefix: " m",
                    tailPrefix: true,
                    swapHiddenInput: true,
                    signBeforePrefix: true,
                    rawValueTrimPrefix: true,
                    noImmediatePrefix: true,
                });
            });
        }

        if ($(".init-volume-number").length) {
            // cleverjs error when no element
            $(".init-volume-number").each(function(i, obj) {
                // INIT VOLUME NUMBER
                new Cleave(obj, {
                    numeral: true,
                    prefix: " M³",
                    tailPrefix: true,
                    swapHiddenInput: true,
                    signBeforePrefix: true,
                    rawValueTrimPrefix: true,
                    noImmediatePrefix: true,
                });
            });
        }

        if ($(".init-tinymce").length) {
            // cleverjs error when no element
            tinymce.init({
                selector: 'textarea.init-tinymce',
                promotion: false
            });
        }

        $(".btn-delete").click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest("form").submit();
                }
            });
        });
    });

    // Currency Format
    function currency(number) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(number);
    }

    function swalLoading() {
        Swal.fire({
            text: "Tunggu Sebentar",
            timer: 3000,
            allowOutsideClick: false,
            timerProgressBar: true,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            },
        });
    }

    function swalComingSoon() {
        Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: 'Coming Soon!',
        })
    }

    // read all notification
    function readNotifAdmin() {
        clearLocalNotification(true)
    }

    function readNotifDashboard() {
        clearLocalNotification(false)
    }


    async function clearLocalNotification(isAdmin) {
        const url = isAdmin ? `{{ url('admin/local-notification/clear') }}` :
            `{{ url('dashboard/local-notification/clear') }}`;

        await $.post(url, {
            _token: "{{ csrf_token() }}"
        });

        location.reload();
    }
</script>
