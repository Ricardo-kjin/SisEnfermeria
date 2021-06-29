@extends('admin.layouts.dashboard')

@section('content')

<h3>Create New turnos</h3>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/turnos" enctype="multipart/form-data">
    @csrf {{-- csrf_field() --}}

    <div class="form-group">
        <label for="title">Nombre del nuevo insumo</label>
        <input type="text" name="nombre" class="form-control col-md-6" id="nombre" placeholder="Nombre..." value="{{ old('nombre') }}">
    </div>
    <div class="form-group">
        <label for="title">  Fecha </label>
        <input type="date" name="fecha" class="form-control col-md-6" id="fecha" placeholder="Nombre..." value="{{ old('fecha') }}">
    </div>
    <div class="form-group">
        <label for="title">  Hora </label>
        <input type="time" name="hora" class="form-control col-md-6" id="hora" placeholder="Nombre..." value="{{ old('hora') }}">
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="submit">
    </div>
</form>



@endsection
