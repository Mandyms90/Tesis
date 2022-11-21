@extends('layouts.app')

@section('template_title')
    Create Carrucel
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Agregar Imagen al Carrucel </h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @includeif('partials.errors')
                            
                            <div class="card card-default">
                                <form method="POST" action="{{ route('carrucels.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('carrucels.form')
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection

{{--  @section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar Imagen al Carrucel</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('carrucels.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('carrucels.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection  --}}
