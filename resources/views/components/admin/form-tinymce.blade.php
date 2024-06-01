@props(['value' => null])

<div class="form-group">
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>
    <textarea class="form-control init-tinymce @error($name) is-invalid @enderror" name="{{ $name }}"
        id="xid-{{ $name }}" placeholder="Enter {{ $label }}">{{ old($name) ?? $value }}</textarea>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
