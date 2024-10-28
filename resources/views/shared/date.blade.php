@php
    // Définir la date actuelle au format Y-m-d (format attendu pour un input type date)
    $currentDate = date('Y-m-d');
@endphp

<div class="{{ $class ?? '' }}">
    <input
        style="border: none; border-radius: 0; border-bottom: 1px solid #000;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value ? old($name, $value) : $currentDate }}"
        placeholder="{{ $placeholder ?? 'Date :' }}"  
        class=" mt-2 form-control @error($name) is-invalid @enderror"
        onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"
    >
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>