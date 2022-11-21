@extends('layouts.app')

@section('template_title')
    {{ $noticia->name ?? 'Noticia' }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Noticia </h3> 
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">                   
                        <div class="card-body">                            
                            <div class="form-group">
                                <strong class="h5"> Imagen:  </strong>
                                <a href="{{ asset('storage').'/'.$noticia->pdf }}" target="_blank">
                                    <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$noticia->imagen }}" style="width: 300px; height: 300px;  object-fit: scale-down;" >  
                                </a> 
                            </div>                         
                            <div class="form-group">
                                <strong class="h5"> Título:  </strong>
                                {{ $noticia->titulo }}
                            </div>
                            <div class="form-group">
                                <strong class="h5"> Descripcion:  </strong>
                                {{ $noticia->descripcion }}
                            </div>
                            <div class="float-left">
                                <a class="btn btn-primary" href="{{ route('noticias.index') }}"> Volver </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
