@extends('admin.layouts.dashboard')

@section('content')

<h1>Create new Medicamento</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/medicamentos">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="medicamento_name"> <b> Nombre del medicamento </b></label>
        <input type="text" name="medicamento_name" class="form-control" id="medicamento_name" placeholder="Nombre del medicamento..." value="{{ old('medicamento_name') }}" required>
    </div>
    <div class="form-group">
        <label for="composicion"> <b> Composicion</b></label>
        <input type="text" name="composicion" tag="composicion" class="form-control" id="composicion" placeholder="Composicion..." value="{{ old('composicion') }}" required>
    </div>
    <div class="form-group">
        <label for="dosis"><b> Dosis</b></label>
        <input type="text" name="dosis" tag="dosis" class="form-control" id="dosis" placeholder="Dosis..." value="{{ old('dosis') }}" required>
    </div>
    <div class="form-group">
        <label for="codigo"><b> Codigo</b></label>
        <input type="text" name="codigo" tag="codigo" class="form-control" id="codigo" placeholder="Codigo..." value="{{ old('codigo') }}" required>
    </div>
    <div class="form-group">
        <label for="precio"><b> Precio</b></label>
        <input type="text" name="precio" tag="precio" class="form-control" id="precio" placeholder="Precio..." value="{{ old('precio') }}" required>
    </div>


    <div class="form-group" >
        <label for="tipo_medicamento"> <b> Tipo de medicamento</b></label>
        <input type="text" data-role="tagsinput" name="tipo_medicamento" class="form-control" id="tipo_medicamento" value="{{ old('tipo_medicamento') }}">
    </div>
    <div class="form-group" >
        <label for="presentacion_medicamento"><b>Presenctacion de medicamento</b></label>
        <input type="text" data-role="tagsinput" name="presentacion_medicamento" class="form-control" id="presentacion_medicamento" value="{{ old('presentacion_medicamento') }}">
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

@section('css_medicamento_page')
    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
@endsection

@section('js_medicamento_page')
    <script src="/js/admin/bootstrap-tagsinput.js"></script>


@endsection

@endsection
