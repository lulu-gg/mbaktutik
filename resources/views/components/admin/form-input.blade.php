@props(['required' => true, 'type' => 'text', 'value' => null, 'readonly' => false, 'step' => null, 'information' => null, 'placeholder' => null])

<div class="form-group">
    <label>{{ $label }}</label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="{{ $placeholder ?? 'Enter ' . $label }}" id="xid-{{ $name }}" value="{{ old($name) ?? $value }}"
        {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }}
        @if ($type == 'number' && $step != null) step="{{ $step }}" @endif />
    @if ($information)
        <small class="fw-light">* <i>{{ $information }}</i> </small>
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
