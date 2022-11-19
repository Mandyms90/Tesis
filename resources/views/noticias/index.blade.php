@extends('layouts.app')

@section('template_title')
    Noticias
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">                     
                        <span id="card_title">
                            <div class="h3">Noticias</div>
                        </span>                
                    </div>
                    <div class="container">
                        <div>
                            <a href="{{ route('noticias.create') }}" class="btn btn-primary btn-sm float-left"  data-placement="left">
                             {{ __('Crear Noticia') }}
                            </a>
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
                                <thead style="background-color: #6777ef;">
                                    <tr>
                                        <th style="display: none;">No</th>                                        
										<th style="color: #fff;">Imagenes</th>
										<th style="color: #fff;">Titulos</th>
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
                                                    <a class="btn btn-sm btn-info" href="{{ route('noticias.edit',$noticia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar </button>
                                                </form>
                                            </td>
                                        </tr>                                          
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pagination justify-content-end">
                    {!! $noticias->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection