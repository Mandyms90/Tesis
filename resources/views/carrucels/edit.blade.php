@extends('layouts.app')

@section('template_title')
    Update Carrucel
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Editar Imagen del Carrucel </h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">                       
                        <div class="card-body">
                            <form method="POST" action="{{ route('carrucels.update', $carr->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                @include('carrucels.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
