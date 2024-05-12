@props(['value' => null, 'multiple' => false, 'information' => null])

<div class="form-group">
    <label>{{ $label }}</label>

    <input type="file" id="xid-{{ $multiple ? str_replace('[]', '', $name) : $name }}" name="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }} />

    @if ($information)
        <small class="fw-bold">* <i>{{ $information }}</i> </small>
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

@if ($value == null)
    @push('page-script')
        <script>
            $(function() {
                $("#xid-{{ $multiple ? str_replace('[]', '', $name) : $name }}").fileinput({
                    allowedFileExtensions: ['mp4'],
                    showUpload: false, // hide upload button
                    showRemove: false,
                    showCaption: false,
                    showBrowse: false,
                    overwriteInitial: {{ $multiple ? 'false' : 'true' }}, // append files to initial preview
                    browseOnZoneClick: true,
                    initialPreviewAsData: true,
                });
            })
        </script>
    @endpush
@else
    @push('page-script')
        <script>
            $(function() {
                $("#xid-{{ $multiple ? str_replace('[]', '', $name) : $name }}").fileinput({
                    allowedFileExtensions: ['mp4'],
                    showUpload: false, // hide upload button
                    showRemove: false,
                    showCaption: false,
                    showBrowse: false,
                    overwriteInitial: {{ $multiple ? 'false' : 'true' }}, // append files to initial preview
                    browseOnZoneClick: true,
                    initialPreviewAsData: true,
                    initialPreview: [
                        "{{ $value }}",
                    ],
                });
            })
        </script>
    @endpush
@endif
