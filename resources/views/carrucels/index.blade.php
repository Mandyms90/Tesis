@extends('layouts.app')

@section('template_title')
    Carrucel
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading">Carrucel de Bienvenida</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('carrucels.create') }}" class="btn btn-success" >
                                {{ __('Agregar Imagen') }}
                            </a>                             
                                                    
                           
                            @if ($message = Session::get('success'))
                                <br>
                                <br>
                                <div class="alert alert-success alert-dismissible">
                                    <p>{{ $message }}</p>
                                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                        <span aria-hidden="true">&times;</span>
                                    </button>                            
                                </div>
                            @endif
                            <div class="table-responsive table-striped mt-2">
                                <table class="table table-hover">
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
                                                        <a class="btn btn-sm btn-warning" href="{{ route('carrucels.edit',$carrucel->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quiere eliminar esta imagen?')" ><i class="fa fa-fw fa-trash" ></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="paginatio{n justify-content-end">
                        {{ $carr->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




    {{--  <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span id="card_title">
                            <div class="h3"> Carrucel de Bienvenida </div>
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
@endsection  --}}
