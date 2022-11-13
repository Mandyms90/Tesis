@extends('layouts.app_ini')

@section('template_title')
    {{ $informe->name ?? 'Show Informe' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Informe</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('informes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $informe->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $informe->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <a href="{{ asset('storage').'/'.$informe->pdf }}" target="_blank">
                                <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$informe->imagen }}" width="150" alt="" >  
                            </a> 
                        </div>
                        <div class="form-group">
                            <strong>Pdf:</strong>
                            <a href="{{ asset('storage').'/'.$informe->pdf }}" target="_blank">
                                <img src="{{ asset('img/pdf ico.jpg') }}" class="img-thumbnail img-fluid border border-5" alt="" width="10%">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
