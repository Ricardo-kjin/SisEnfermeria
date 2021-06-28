@extends('admin.layouts.dashboard')

@section('content')

<h3>Actualizar instrumento</h3>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/instrumentos/{{$instrumento->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf {{-- csrf_field() --}}

    <div class="form-group">
        <label for="title">Nombre del nuevo instrumento</label>
        <input type="text" name="nombre" class="form-control col-md-6" id="nombre" placeholder="Nombre..." value="{{ $instrumento->nombre }}">
    </div>

    <div class="form-group">
        <label for="content">Insert descripción</label>
        <textarea name="descripcion" id="content">{{ $instrumento->descripcion }}</textarea>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

<script>
    CKEDITOR.replace( 'descripcion' );
</script>

@endsection
