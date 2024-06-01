@props(['required' => true, 'value' => null, 'readonly' => false, 'information' => null, 'withTime' => false])

<div class="form-group">
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>
    <input type="date" class="form-control init-flatpickr @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="Select {{ $label }}" id="xid-{{ $name }}"
        @if ($withTime) data-withTime="true" @endif {{ $required ? 'required' : '' }}
        @if ($value) data-defaultDate="{{ $value }}" @endif
        {{ $readonly ? 'readonly' : '' }} />

    @if ($information)
        <small class="fw-bold">* <i>{{ $information }}</i> </small>
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
