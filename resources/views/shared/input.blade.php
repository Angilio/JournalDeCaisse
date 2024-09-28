@php
    $class ??= null;
    $type ??= 'text';
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    @if ($type == 'textarea')
        <textarea placeholder="{{ $placeholder }}" type="{{ $type }}" style="border: none; border-bottom:solid black 1px; border-radius: 0; background-color:transparent; resize:none; height: 20px;" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="">{{ old($name) }}</textarea>
    @else
        <input placeholder="{{ $placeholder }}" style="border: none; border-bottom:solid black 1px; border-radius: 0; background-color:transparent;" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="form-control m-2 @error($name) is-invalid @enderror" value="{{ old($name,$value) }}">
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>