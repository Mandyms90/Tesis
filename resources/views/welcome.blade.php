@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
          <div class="page__heading ">
            {{--  <div class="jumbotron">  --}}
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
            {{--  </div>   --}}
            {{--  <div class="container">
              <h1 class="display-4">!!Bienvenidos a la UICI!!</h1>            
              <p class="lead">Unidad de Inteligencia y Competitividad Industrial.</p>
            </div>  --}}
          </div>  
        </div>
        <div class="section-body">
          {{--  <div class="row">
                <div class="col-lg-12">  --}}
                    <div class="card">
                        <div class="card-body">
                            {{--  <div class="row">
                                <div class="col-md-4 col-xl-4">      --}}
                                    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                                        <ol class="carousel-indicators">
                                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img src="{{ asset('img/ac4f0fe0f6deeb7b928fb6502cb24eaf.jpeg') }}" class="img-fluid rounded  d-block w-100 p-3" alt="...">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="{{ asset('img/b5a69ea3f147ce874403bcc07044321c.jpeg') }}" class="img-fluid rounded  d-block w-100 p-3" alt="...">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="{{ asset('img/a894b60826ff418671148d6b647ea727.jpeg') }}" class="img-fluid rounded  d-block w-100 p-3" alt="...">
                                          </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </button>
                                      </div>                                
                                    {{--  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                              <img src="{{ asset('img/2022-02-25-0002.jpg') }}" class="d-block w-100" alt="...">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="{{ asset('img/2022-02-25-0003.jpg') }}" class="d-block w-100" alt="...">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="{{ asset('img/2022-02-25-0004.jpg') }}" class="d-block w-100" alt="...">
                                          </div>
                                        </div>
                                    </div>  --}}
                                {{--  </div>
                            </div>   --}}
                        </div>
                    </div>
                {{--  </div>
            </div>  --}}
        </div>
       
    </section>
@endsection

