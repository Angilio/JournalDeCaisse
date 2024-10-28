@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    <select name="beneficiaire_id" id="selectSortie">
        <option value="" disabled selected>Sélectionner un béneficiaire</option>
        @foreach ($beneficiaires as $b => $bb)
            <option {{ $sortie->exists && $sortie->beneficiaire_id == $b ? 'selected' : '' }} value="{{ $b }}">{{ $bb }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror    
</div>