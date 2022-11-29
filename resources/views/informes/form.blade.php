<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $informe->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $informe->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Público') }}
            {{ Form::checkbox('private', $informe->private, ['class' => 'form-control' . ($errors->has('private') ? ' is-invalid' : ''), 'placeholder' => 'Público']) }}
            {!! $errors->first('private', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       
            <div class="form-group">
                {{ Form::label('user_id') }}
                {{ Form::select('user_id', $users, $informe->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>            
       

        <div class="form-group">
            {{ Form::label('imagen') }}
            <br>
            @if (@isset($informe->imagen))
            <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$informe->imagen }}" style="width: 90px; height: 90px;  object-fit: scale-down;" >
            @endif
            <input  type="file" accept=".jpg,.jpeg,.png" class="form-control" name="imagen"  id="imagen"  >
            {{ $errors->first('imagen', '<div class="invalid-feedback">:message</div>') }}
            {{--  {{ form::file('imagen', $informe->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : '')]) }}  --}}
            {{--  {{ Form::text('imagen', $informe->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}  --}}
            {{--  {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}  --}}
        </div>

        <div class="form-group">
            {{ Form::label('Documento') }}
            <br>
            @if (@isset($informe->pdf))
            <img class="img-thumbnail img-fluid border border-5" src="{{ asset('img/pdf ico.jpg') }}" style="width: 90px; height: 90px;  object-fit: scale-down;" >
            @endif
            <input  type="file" accept=".pdf" class="form-control" name="pdf"  id="pdf"  >
            {{--  {{ Form::text('pdf', $informe->pdf, ['class' => 'form-control' . ($errors->has('pdf') ? ' is-invalid' : ''), 'placeholder' => 'Pdf']) }}  --}}
            {!! $errors->first('pdf', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ url('/informes') }}" class="btn btn-primary"> Regresar </a>
    </div>
</div>