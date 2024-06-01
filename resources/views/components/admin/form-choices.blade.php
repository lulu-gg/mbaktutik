@props(['required' => true, 'selected' => [], 'options' => [], 'optionValue' => null, 'optionDisplay' => null, 'multiple' => false])
<div class="form-group">
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>

    <select class="choices form-select @error($name) is-invalid @enderror" name="{{ $name }}"
        id="xid-{{ $multiple ? str_replace('[]', '', $name) : $name }}" {{ $required ? 'required' : '' }}
        {{ $multiple ? 'multiple' : '' }}>
        @foreach ($options as $option)
            <option value="{{ $optionValue ? $option->$optionValue : $option->id }}"
                {{ in_array($optionValue ? $option->$optionValue : $option->id, $selected) ? 'selected' : '' }}>
                {{ $optionDisplay ? $option->$optionDisplay : $option->name }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    @push('page-script')
        <script>
            $(function() {
                let initChoice = new Choices(document.querySelector('#xid-{{ $multiple ? str_replace('[]', '', $name) : $name }}'), {
                    delimiter: ",",
                    editItems: false,
                    maxItemCount: -1,
                    removeItemButton: true,
                })
            })
        </script>
    @endpush
</div>
