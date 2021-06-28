@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('/storage/images/servicio_image/'.$servicio['img_url']) }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
            <h1>{{$servicio['nombre']}}</h1>
            <span class="subheading">Habilitada desde:{{ $servicio['created_at'] }}</span>
            </div>
        </div>
        </div>
    </div>
    </header>

    <!-- Main Content -->
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p>{!!$servicio['descripcion']!!}</p>
        <b>Precio: {{$servicio['precio']}} bs.</b>
        </div>
    </div>
    </div>

    <hr>

@endsection
