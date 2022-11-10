@extends('layouts.app_ini')

@section('template_title')
    Informe
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">                     
                        <span id="card_title">
                            <div class="h3">Informes</div>
                        </span>                
                    </div>
                    <div class="container">
                        <div>
                            <a href="{{ route('informes.create') }}" class="btn btn-primary btn-sm float-left"  data-placement="left">
                             {{ __('Crear Informe') }}
                            </a>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Imagen</th>
										<th>Pdf</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informes as $informe)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $informe->titulo }}</td>
											<td>{{ $informe->descripcion }}</td>
											<td>{{ $informe->imagen }}</td>
											<td>{{ $informe->pdf }}</td>

                                            <td>
                                                <form action="{{ route('informes.destroy',$informe->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('informes.show',$informe->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('informes.edit',$informe->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $informes->links() !!}
            </div>
        </div>
    </div>
@endsection