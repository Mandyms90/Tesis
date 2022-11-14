@extends('layouts.app')

@section('template_title')
    {{ $carrucel->name ?? 'Show Carrucel' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Carrucel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carrucels.index') }}"> volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
