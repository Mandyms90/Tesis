<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('imagen') }}
            <br>
            @if (@isset($carr->foto))
            <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$carr->foto }}"  alt="" >
            @endif
            <input  type="file" accept=".jpg,.jpeg,.png" class="form-control" name="foto"  id="foto"  >
            {{ $errors->first('imagen', '<div class="invalid-feedback">:message</div>') }}            
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success"> Guardar </button>
        <a href="{{ url('/carrucels') }}" class="btn btn-primary"> Regresar </a>
    </div>
</div>