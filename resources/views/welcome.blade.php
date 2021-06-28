@extends('layouts.app')
@section('content')



  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>SERVICIOS DE ENFERMERIA</h1>
            <span class="subheading">Realizamos un servicio responsable hacia usted</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="col-lg-8 col-md-10 mx-auto">
        <div class="row">

          @foreach ($servicios as $servicio)
          <div class="col-md-4">
            <img class="img-thumbnail mt-4" width="100%" src="{{ asset('/storage/images/servicio_image/'.$servicio['img_url']) }}" alt="servicio_image">
          </div>
          <div class="col-md-8">
            <div class="post-preview">
              <a href="/home/{{$servicio['id']}}">
                <h2 class="post-title">
                  {{$servicio['nombre']}}
                </h2>
                <h3 class="post-subtitle">
                  {!!getShorterString($servicio['descripcion'],30)!!}
                </h3>
              </a>
              <p class="post-meta">Habilitada
                <a href="#"></a>
                desde: {{$servicio['created_at']}}</p>
            </div>
          </div>
          <hr>
          @endforeach

      </div>
 <!-- Pager-->
      {{ $servicios->links() }}

    </div>
  </div>

  <hr>

  @endsection
