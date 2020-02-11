{{ csrf_field() }}

<label for="first_field">First field</label>
<div class="input-group mb-3">
    <input type="text" class="form-control" id="first_field" name="first_field" maxlength="32" value="{{ $item->first_field ?? old( 'first_field' ) }}">
</div>

<label for="second_field">First field</label>
<div class="input-group">
    <textarea class="form-control" id="second_field" name="second_field" maxlength="65535">{{ $item->second_field ?? old( 'second_field' ) }}</textarea>
</div>

<button type="submit" class="btn btn-primary mt-1 mb-1">Guardar</button>