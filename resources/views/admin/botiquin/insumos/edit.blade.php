@extends('admin.layouts.dashboard')

@section('content')

<h3>Actualizar Insumo</h3>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/insumos/{{$insumo->id}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf {{-- csrf_field() --}}

    <div class="form-group">
        <label for="title">Nombre del nuevo insumo</label>
        <input type="text" name="nombre" class="form-control col-md-6" id="nombre" placeholder="Nombre..." value="{{ $insumo->nombre }}">
    </div>

    <div class="form-group">
        <label for="title">Precio</label>
        <input type="number" name="precio" class="form-control col-md-2" id="precio" placeholder="Precio..." value="{{ $insumo->precio }}">
    </div>
    <div class="form-group">
        <label for="content">Insert descripción</label>
        <textarea name="descripcion" id="content">{{ $insumo->descripcion }}</textarea>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="submit">
    </div>
</form>

<script>
    CKEDITOR.replace( 'descripcion' );
</script>

@endsection
