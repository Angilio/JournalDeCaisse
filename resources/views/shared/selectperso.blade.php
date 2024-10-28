@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    <select name="personnel_id" id="selectSortie">
        <option value="" disabled selected>Sélectionner un personnel</option>
        @foreach ($personnels as $p => $pp)
            <option {{ $sortie->exists && $sortie->personnel_id == $p ? 'selected' : '' }} value="{{ $p }}">{{ $pp }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror    
</div>