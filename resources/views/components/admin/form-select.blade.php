@props([
    'required' => true,
    'value' => null,
    'options' => [],
    'optionValue' => null,
    'optionDisplay' => null,
    'isSelectArray' => false,
    'multiple' => null,
])

@php
    if (!$isSelectArray && is_array($options)) {
        $tempOptions = $options;
        $options = collect($tempOptions)->map(function ($item) {
            return (object) $item;
        });
    }
@endphp


<div class="form-group">
    <label>{{ $label }}</label>
    <select class="init-select2 form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        id="xid-{{ $name }}" {{ $required ? 'required' : '' }}
        @if ($multiple == 'multiple') multiple="multiple" @endif>
        <option selected disabled></option>
        @if ($isSelectArray)
            @foreach ($options as $key => $val)
                <option value="{{ $key }}" {{ CustomHelpers::isOptionSelected($name, $key, $value) }}>
                    {{ $val }}
                </option>
            @endforeach
        @else
            @foreach ($options as $option)
                <option value="{{ $optionValue ? $option->$optionValue : $option->id }}"
                    {{ CustomHelpers::isOptionSelected($name, $optionValue ? $option->$optionValue : $option->id, $value) }}>
                    {{ $optionDisplay ? $option->$optionDisplay : $option->name }}
                </option>
            @endforeach
        @endif
    </select>


    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
