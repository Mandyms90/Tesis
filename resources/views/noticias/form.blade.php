<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('imagen') }}
            <br>
            @if (@isset($noticia->imagen))
            <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$noticia->imagen }}"  alt="" >
            @endif
            <input  type="file" accept=".jpg,.jpeg,.png" class="form-control" name="imagen"  id="imagen"  >
            {{ $errors->first('imagen', '<div class="invalid-feedback">:message</div>') }}  
        </div>         

        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $noticia->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::textarea('descripcion', $noticia->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success"> Guardar </button>
        <a href="{{ url('/noticias') }}" class="btn btn-primary"> Regresar </a>
    </div>
</div>