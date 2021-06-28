@extends('admin.layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2><b>Nombre: {{$medicamento['nombre']}}</b></h2>
            <h4>Composicion: {{$medicamento['composicion']}}</h4>
            <h4>Dosis: {{$medicamento['dosis']}}</h4>
            <h4>Codigo: {{$medicamento['codigo']}}</h4>
            <h4>Precio: {{$medicamento['precio']}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Tipo</h5>
            <p class="card-text">
                @if ($medicamento->tipos != null)

                @foreach ($medicamento->tipos as $tipo)
                    <span class="badge badge-secondary">
                        {{ $tipo->nombre }}
                    </span>
                @endforeach

            @endif
            </p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Presentacion</h5>
            <p class="card-text">
            @if ($medicamento->presentacions != null)

                @foreach ($medicamento->presentacions as $presentacion)
                    <span class="badge badge-secondary">
                        {{ $presentacion->nombre }}
                    </span>
                @endforeach

            @endif
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>

@endsection
