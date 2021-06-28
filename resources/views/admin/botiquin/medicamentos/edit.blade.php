@extends('admin.layouts.dashboard')

@section('content')

<h1>Update the Role</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/medicamentos/{{$medicamento->id}}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="medicamento_nombre">Nombre</label>
        <input type="text" name="medicamento_nombre" class="form-control" id="medicamento_nombre" placeholder="Nombre..." value="{{$medicamento->nombre}}" required>
    </div>
    <div class="form-group">
        <label for="composicion">Composicion</label>
        <input type="text" name="composicion" tag="composicion" class="form-control" id="composicion" placeholder="Composicion..." value="{{$medicamento->composicion}}" required>
    </div>
    <div class="form-group">
        <label for="dosis">Dosis</label>
        <input type="text" name="dosis" tag="dosis" class="form-control" id="dosis" placeholder="Dosis..." value="{{$medicamento->dosis}}" required>
    </div>
    <div class="form-group">
        <label for="codigo">Codigo</label>
        <input type="text" name="codigo" tag="codigo" class="form-control" id="codigo" placeholder="Codigo..." value="{{$medicamento->codigo}}" required>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio" tag="precio" class="form-control" id="precio" placeholder="Precio..." value="{{$medicamento->precio}}" required>
    </div>

    <div class="form-group" >
        <label for="medicamentos_tipos">Tipos</label>
        <input type="text" data-role="tagsinput" name="medicamentos_tipos" class="form-control" id="medicamentos_tipos" value="@foreach ($medicamento->tipos as $tipo)
            {{$tipo->nombre. ","}}
        @endforeach">
    </div>
    <div class="form-group" >
        <label for="medicamentos_presentacions">Presentaciones</label>
        <input type="text" data-role="tagsinput" name="medicamentos_presentacions" class="form-control" id="medicamentos_presentacions" value="@foreach ($medicamento->presentacions as $presentacion)
            {{$presentacion->nombre. ","}}
        @endforeach">
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

    <script>
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });

    </script>

@endsection

@endsection
