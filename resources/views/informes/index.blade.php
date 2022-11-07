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
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Informe') }}
                            </span>
                            
                             <div class="float-right">
                                <a href="{{ route('informes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                <thead class="thead">
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
                                                <form action="{{ route('informe.destroy',$informe->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('informe.show',$informe->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('informe.edit',$informe->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
