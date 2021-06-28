@extends('admin.layouts.dashboard')

@section('content')

<h3>Actualizar Servicio</h3>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/servicios/{{$servicio->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf {{-- csrf_field() --}}

    <div class="form-group">
        <label for="title">Nombre del nuevo Servicio</label>
        <input type="text" name="nombre" class="form-control col-md-6" id="nombre" placeholder="Nombre..." value="{{ $servicio->nombre }}">
    </div>

    <label for="image">Select Image</label>
    <input type="file" name="image" class="form-control-file" id="profile-img" value="{{$servicio->image}}">
    <div class="row">
        <img src="{{ asset('/storage/images/servicio_image/'.$servicio->img_url) }}" id="profile-img-tag" class="img-thumbnail mx-auto" alt="{{$servicio->img_url}}" width="250" >
    </div>

    <div class="form-group">
        <label for="title">Precio</label>
        <input type="text" name="precio" class="form-control col-md-2" id="precio" placeholder="Precio..." value="{{ $servicio->precio }}">
    </div>
    <div class="form-group">
        <label for="content">Insert descripción</label>
        <textarea name="descripcion" id="content">{{ $servicio->descripcion }}</textarea>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

<script>
    CKEDITOR.replace( 'descripcion' );
</script>

@endsection
