@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>            
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">                    
                    <div class="card">
                        <div class="card-body">
                            @can('crear-usuario')
                                <a class="btn btn-success" href="{{ route('usuarios.create') }}">  Crear Usuario </a>
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
                                <thead style="background-color: #6777ef;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">E-mail</th>
                                    <th style="color: #fff;">Rol</th>
                                    <th style="color: #fff;">Activo</th>
                                    <th style="color: #fff;">Acciones</th>                                    
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td style="display: none;">{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if (!empty($usuario->getRoleNames()))
                                                    @foreach ($usuario->getRoleNames() as $rolName)
                                                        <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{$usuario->active ? 'checked' : ''}} disabled>
                                                </div>
                                            </td>
                                           
                                            <td>
                                                <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">
                                                    @can('editar-usuario')
                                                        <a class="btn btn-sm btn-warning" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan 
                                                    @can('borrar-usuario')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quiere eliminar este usuario?')"><i class="fa fa-fw fa-trash"></i></button>
                                                    @endcan                                                   
                                                </form>
                                                {{--  <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}"> Editar </a>
                                                {{ Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $usuario->id ], 'style'=>'display:inline']) }}
                                                    {{ Form::submit('Borrar', ['class'=>'btn btn-danger']) }}
                                                {{ Form::close() }}  --}}

                                                {{--  Boton de Borrado  --}}                                             
                                                {{--  <form action="{{ url('/delete'.$usuario->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                                </form>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="pagination">
                                {{ $usuarios->links() }}    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection

