<!--

STILL BROKEN DONT USE IT!!

-->

@props(['required' => true, 'defaultStart' => null, 'defaultEnd' => null, 'readonly' => false, 'information' => null])

<div class="form-group">
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>
    <input type="date" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="Select {{ $label }}" id="xid-{{ $name }}" {{ $required ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }} />

    <input type="hidden" name="{{ $name }}_start" id="xid-{{ $name }}-start">
    <input type="hidden" name="{{ $name }}_end" id="xid-{{ $name }}-end">

    @if ($information)
        <small class="fw-bold">* <i>{{ $information }}</i> </small>
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

@push('page-script')
    @if ($defaultStart && $defaultEnd)
        <script>
            let defaultDate_{{ $name }} = [`{{ $defaultStart }}`, `{{ $defaultEnd }}`];
            console.log(defaultDate_{{ $name }})
        </script>
    @endif

    <script>
        $(function() {
            let flatpickrConfig = {
                mode: 'range',
                minDate: 'today',
                dateFormat: "Y-m-d",
                altInput: true,
                onChange: function(selectedDates, dateStr, instance) {
                    console.log(dateStr)
                    if (selectedDates.length != 2) return

                    $('#xid-{{ $name }}-start').val(Date.parse(selectedDates[0]).toJSON().slice(0,
                        10))
                    $('#xid-{{ $name }}-end').val(Date.parse(selectedDates[1]).toJSON().slice(0,
                        10))

                    console.log([
                        $('#xid-{{ $name }}-start').val(),
                        $('#xid-{{ $name }}-end').val(),
                    ])
                },
            }

            if (typeof defaultDate_{{ $name }} !== 'undefined') {
                flatpickrConfig.defaultDate = defaultDate_{{ $name }}
            }

            flatpickr('#xid-{{ $name }}', flatpickrConfig)
        })
    </script>
@endpush
