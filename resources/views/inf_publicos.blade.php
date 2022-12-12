@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <div class="page__heading ">
        <h3 class="page__heaading"> Informes Públicos </h3> 
      </div>             
    </div>  
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body"> 
              <div class="table-responsive table-striped mt-2">
                <table class="table table-hover">
                    <thead class="thead" style="background-color: #6777ef;">
                        <tr>
                            <th style="display: none;">No</th>                                        
                            <th style="color: #fff;">Título</th>
                            <th style="color: #fff;">Descripcion</th>
                            <th style="color: #fff;">Imagen</th>
                            <th style="color: #fff;">Informes</th>                                          
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($informes as $informe)
                        @if ($informe->active=>)
                          
                        @else
                          
                        @endif
                            <tr>
                                <td style="display: none;">{{ ++$i }}</td>                                            
                                <td>{{ $informe->titulo }}</td>
                                <td>{{ $informe->descripcion }}</td>
                                <td>
                                    <a href="{{ asset('storage').'/'.$informe->pdf }}" target="_blank">
                                        <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$informe->imagen }}" style="width: 90px; height: 90px;  object-fit: scale-down;" >  
                                    </a>                                            
                                </td>
                                <td>
                                    <a href="{{ asset('storage').'/'.$informe->pdf }}" target="_blank">
                                        <img src="{{ asset('img/pdf ico.jpg') }}" class="img-thumbnail img-fluid border border-5" alt="" style="width: 90px; height: 90px;  object-fit: scale-down;">
                                    </a>
                                    </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>  
        </div> 
      </div>            
    </div>    
  </section>
@endsection
 
