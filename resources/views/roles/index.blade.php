@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @can('crear-rol')
                                <a class="btn btn-success" href="{{ route('roles.create') }}" > Crear Rol </a>                                
                            @endcan

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
                            
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="color: #fff;" >Rol</th>
                                    <th style="color: #fff;" >Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role )
                                    <tr>
                                        <td>{{ $role->name }}</td>                              
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="d-inline p-1">
                                                        @can('editar-rol')
                                                            <a class="btn btn-sm btn-warning" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-fw fa-edit"></i></a>                              
                                                        @endcan
                                                    </div>
                                                    <div class="d-inline p-1">
                                                        @can('borrar-rol')
                                                            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">                                              
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quiere eliminar este rol?')"><i class="fa fa-fw fa-trash"></i></button>
                                                            </form>
                                                            {{--  {{ Form::open(['method'=> 'DELETE', 'route'=> ['roles.destroy', $role->id ], 'style'=>'display:inline']) }}
                                                                {{ Form::submit('Borrar', ['class'=>'btn btn-danger']) }}
                                                            {{ Form::close() }}  --}}
                                                        @endcan
                                                    </div>
                                                </div>

                                                </div>

                                            
                                            
                                        </td>                                                               
                                                            
                                        </tr>     
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

