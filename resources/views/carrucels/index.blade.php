@extends('layouts.app')

@section('template_title')
    Carrucel
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span id="card_title">
                            {{ __('Carrucel') }}
                        </span>
                        <div class="container">
                             <div>
                                <a href="{{ route('carrucels.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar Imagen') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <p>{{ $message }}</p>
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>                            
                    </div>
                @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead" style="background-color: #6777ef;">
                                    <tr>
                                        <th style="color: #fff;"> No</th>                                    
                                        <th style="color: #fff;"> Imagen</th>
                                        <th style="color: #fff;"> Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                    @foreach ($carr as $carrucel)                                    
                                        <tr>
                                            <td>{{ ++$i }}</td>                                         
                                            <td>
                                                <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$carrucel->foto }}" style="width: 100px; height: 100px;  object-fit: scale-down;" >     
                                            </td>                                       
                                            <td>
                                                <form action="{{ route('carrucels.destroy',$carrucel->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('carrucels.edit',$carrucel->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $carr->links() !!}
            </div>
        </div>
    </div>
@endsection
