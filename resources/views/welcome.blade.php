@extends('layouts.app_welcome')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading ">Bienvenidos a la Unidad de Inteligencia y Competitividad Industrial.</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">    
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
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
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
@endsection

