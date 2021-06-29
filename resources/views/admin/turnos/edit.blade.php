@extends('admin.layouts.dashboard')

@section('content')

<h3>Actualizar turno</h3>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/turnos/{{$turno->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf {{-- csrf_field() --}}

    <div class="form-group">
        <label for="title">Nombre del nuevo Turno</label>
        <input type="text" name="nombre" class="form-control col-md-6" id="nombre" placeholder="Nombre..." value="{{ $turno->nombre }}">
    </div>

    <div class="form-group">
        <label for="title">Fecha</label>
        <input type="date" name="fecha" class="form-control col-md-2" id="fecha" placeholder="fecha..." value="{{ $turno->fecha }}">
    </div>
    <div class="form-group">
        <label for="title">Hora</label>
        <input type="time" name="hora" class="form-control col-md-2" id="hora" placeholder="hora..." value="{{ $turno->hora }}">
    </div>
    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="submit">
    </div>
</form>


@endsection
