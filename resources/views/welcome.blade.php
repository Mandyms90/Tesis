@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <div class="page__heading ">
        <h1 class="display-4">Hola, bienvenidos a la UICI!</h1>
        <p class="lead">Unidad de Inteligencia y Competitividad Industrial.</p>
        <hr class="my-4">
        {{--  <p>Personal profesional de más de 15 años de experiencia, calificados con masters y diplomados en diversos temas del ámbito empresarial.
          Prestación de servicios de consultorías y asesoramientos Online con la colaboración de expertos en la materia.
          Entrenamientos de nuevas implementaciones en el mercado internacional: Industria 4.0 y la estrategia de la economía circular.
          Recibe capacitaciones actualizadas en centros educativos como: Desoft, CETEC, GECYT, CENSAI, entre otros.
          Posee categoría docente que lo acredita a impartir conferencias y entrenamientos.
          Metodología innovadora para la creación y desarrollo de procesos inversionistas.</p>  --}}
        {{--  <a class="btn btn-primary btn-lg" href="#" role="button">Leer más</a>  --}}
      </div>             
    </div>  
    <div class="section-body">
      <div class="card">
        <div class="card-body">                           
          <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner">        
              @for ($i = 0; $i < count($carr); $i++)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                  <img style="width: 400px; height: 600px; object-fit: contain" src="{{ asset('storage').'/'.$carr[$i]->foto }}" class="img-fluid rounded  d-block w-100" alt="...">
                </div>                              
              @endfor                
              <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <hr class="my-4">
      <br>
      <h1 class="display-5">Noticias</h1>
      <div class="card">
        <div class="car-body">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">             
              @for ($i = 0; $i < count($noticias); $i++)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">                        
                  <img src="{{ asset('storage').'/'.$noticias[$i]->imagen }}" style="width: 70em; height: 450px" class="img-fluid rounded  d-block w-100" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">{{ $noticias[$i]->titulo }}</h5>
                      <p class="card-text">{{ $noticias[$i]->descripcion }}</p>
                    </div>
                </div>                                                 
              @endfor             
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>               
          </div>              
        </div>        
      </div>                        
    </div>    
  </section>
@endsection
 
