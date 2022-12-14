@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blogs</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-blog')
                            <a class="btn btn-success" href="{{ route('blogs.create') }}" > Crear Blog </a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none;" >No</th>
                                    <th style="color: #fff;" >Título</th>
                                    <th style="color: #fff;" >Contenido</th>
                                    <th style="color: #fff;" >Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                    <tr>
                                        <td style="display:none">{{ $blog->name }}</td>
                                        <td>{{ $blog->titulo }}</td>
                                        <td>{{ $blog->contenido }}</td>
                                        <td>
                                            <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                                                @can('editar-blog')
                                                    <a class="btn btn-warning" href="{{ route('blogs.edit',$blog->id) }}" > Editar </a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-blog')
                                                   <button type="submit" class="btn btn-danger"> Borrar </button>
                                                @endcan
                                            </form>
                                           </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Centramos la paginacion a la derecha --}}
                            <div class="paginatio{n justify-content-end">
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
