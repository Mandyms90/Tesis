@extends('layouts.app')

@section('template_title')
    Noticias
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Noticias </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                  
                            <a href="{{ route('noticias.create') }}" class="btn btn-success"  data-placement="left">
                                {{ __('Crear Noticia') }}
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
                                            <th style="display: none;">No</th>                                        
                                            <th style="color: #fff;">Imagenes</th>
                                            <th style="color: #fff;">Títulos</th>
                                            <th style="color: #fff;">Descripcion</th>
                                            <th style="color: #fff;">Acciones</th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($noticias as $noticia)
                                            <tr>
                                                <td style="display: none;">{{ ++$i }}</td>                                            
                                                <td>                                                
                                                    <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$noticia->imagen }}" style="width: 90px; height: 90px;  object-fit: scale-down;" >  
                                                </td>											
                                                <td>{{ $noticia->titulo }}</td>
                                                <td style="width: 400px; height: 50px;  ">{{ $noticia->descripcion }}</td>
                                                <td>
                                                    <form action="{{ route('noticias.destroy',$noticia->id) }}" method="POST">                                                    
                                                        <a class="btn btn-sm btn-primary " href="{{ route('noticias.show',$noticia->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-warning" href="{{ route('noticias.edit',$noticia->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quiere eliminar la noticia?')"><i class="fa fa-fw fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>                                          
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    </div>
                    <div class="pagination">
                        {!! $noticias->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection