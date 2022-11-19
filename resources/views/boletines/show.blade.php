@extends('layouts.app')

@section('template_title')
    {{ $boletin->name ?? 'Show Informe' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Informe</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('boletines.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong class="h5">Título:</strong>
                            {{ $boletin->titulo }}
                        </div>
                        <div class="form-group">
                            <strong class="h5">Descripcion:</strong>
                            {{ $boletin->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong class="h5">Imagen:</strong>
                            <a href="{{ asset('storage').'/'.$boletin->pdf }}" target="_blank">
                                <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$boletin->imagen }}" width="150" alt="" >  
                            </a> 
                        </div>
                        <div class="form-group">
                            <strong class="h5">Documento:</strong>
                            <a href="{{ asset('storage').'/'.$boletin->pdf }}" target="_blank">
                                <img src="{{ asset('img/pdf ico.jpg') }}" class="img-thumbnail img-fluid border border-5" alt="" width="10%">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection