@extends('layouts.app')

@section('template_title')
    {{ $boletin->name ?? 'Ver Boletín' }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Boletín </h3> 
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">                   
                        <div class="card-body">
                            
                            <div class="form-group">
                                <strong class="h5"> Título:  </strong>
                                {{ $boletin->titulo }}
                            </div>
                            <div class="form-group">
                                <strong class="h5"> Descripcion:  </strong>
                                {{ $boletin->descripcion }}
                            </div>
                            <div class="form-group">
                                <strong class="h5"> Imagen:  </strong>
                                <a href="{{ asset('storage').'/'.$boletin->pdf }}" target="_blank">
                                    <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$boletin->imagen }}" style="width: 200px; height: 200px;  object-fit: scale-down;">  
                                </a> 
                            </div>
                            <div class="form-group">
                                <strong class="h5"> Documento:  </strong>
                                <a href="{{ asset('storage').'/'.$boletin->pdf }}" target="_blank">
                                    <img src="{{ asset('img/pdf ico.jpg') }}" class="img-thumbnail img-fluid border border-5" alt="" style="width: 90px; height: 90px;  object-fit: scale-down;">
                                </a>
                            </div>
                            
                            <div class="float-left">
                                <a class="btn btn-primary" href="{{ route('boletines.index') }}"> Volver </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
