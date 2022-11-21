@extends('layouts.app')

@section('template_title')
    Boletin
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heaading"> Boletines </h3>   
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">                     
                        <div class="card-body">
                            <a href="{{ route('boletines.create') }}" class="btn btn-success"  data-placement="left">
                                {{ __(' Crear Boletines ') }}
                            </a>                            
    
                            @if ($message = Session::get('success'))
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
                                            <th style="display: none;"> No </th>                                        
                                            <th style="color: #fff;"> Título </th>
                                            <th style="color: #fff;"> Descripcion </th>
                                            <th style="color: #fff;"> Imagen </th>
                                            <th style="color: #fff;"> Boletines </th> 
                                            <th style="color: #fff;"> Acciones </th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($boletines as $boletin)
                                            <tr>
                                                <td style="display: none;">{{ ++$i }}</td>                                            
                                                <td>{{ $boletin->titulo }}</td>
                                                <td>{{ $boletin->descripcion }}</td>
                                                <td>
                                                    <a href="{{ asset('storage').'/'.$boletin->pdf }}" target="_blank">
                                                        <img class="img-thumbnail img-fluid border border-5" style="width: 90px; height: 90px;  object-fit: scale-down;" src="{{ asset('storage').'/'.$boletin->imagen }}"  alt="" >  
                                                    </a>                                            
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage').'/'.$boletin->pdf }}" target="_blank">
                                                        <img src="{{ asset('img/pdf ico.jpg') }}" class="img-thumbnail img-fluid border border-5" style="width: 90px; height: 90px;  object-fit: scale-down;">
                                                    </a>
                                                    </td>
                                                <td>
                                                    <form action="{{ route('boletines.destroy',$boletin->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('boletines.show',$boletin->id) }}"><i class="fa fa-fw fa-eye"></i> Ver </a>
                                                        <a class="btn btn-sm btn-warning" href="{{ route('boletines.edit',$boletin->id) }}"><i class="fa fa-fw fa-edit"></i> Editar </a>
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
                        {{ $boletines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
