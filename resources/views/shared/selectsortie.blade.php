@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    <select name="category_id" id="selectSortie">
        <option value="" disabled selected>Sélectionner une catégorie</option>
        @foreach ($categories as $k => $v)
            <option {{ $sortie->exists && $sortie->category_id == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror    
</div>

