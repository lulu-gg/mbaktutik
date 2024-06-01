@props(['required' => true, 'value' => null, 'rows' => 3])

<div class="form-group">
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="xid-{{ $name }}"
        placeholder="Enter {{ $label }}" rows="{{ $rows }}" {{ $required ? 'required' : '' }}>{{ old($name) ?? $value }}</textarea>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
