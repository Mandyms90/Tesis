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
                                            <th style="display: none;"> No </th>                                        
                                            <th style="color: #fff;"> Título </th>
                                            <th style="color: #fff;"> Descripcion </th>
                                            <th style="color: #fff;"> Imagen </th>
                                            <th style="color: #fff;"> Boletines </th>                                                          
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pagination">
                        {{ $boletines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
