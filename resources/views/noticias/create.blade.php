@extends('layouts.app')

@section('template_title')
    Crear Noticia
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Agregar Nueva Noticia </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @includeif('partials.errors')

                            <div class="card card-default">                               
                                <form method="POST" action="{{ route('noticias.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('noticias.form')            
                                </form>                            
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
@endsection
