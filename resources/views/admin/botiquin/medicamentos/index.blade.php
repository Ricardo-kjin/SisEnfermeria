@extends('admin.layouts.dashboard')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Lista de Medicamentos</h2>
    </div>
    <div class="col-md-6">
        <a href="/medicamentos/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Medicamento</a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Medicamentos</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Cod:Nombre</th>
              <th>Composicion</th>
              <th>Dosis</th>
              <th>Precio</th>
              <th>Tipo</th>
              <th>Presentacion</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Cod:Nombre</th>
              <th>Composicion</th>
              <th>Dosis</th>
              <th>Precio</th>
              <th>Tipo</th>
              <th>Presentacion</th>
              <th>Tools</th>
            </tr>
          </tfoot>
          <tbody>

                @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento['id'] }}</td>
                    <td>{{ $medicamento['codigo'] }}-{{ $medicamento['nombre'] }}</td>
                    <td>{{ $medicamento['composicion'] }}</td>
                    <td>{{ $medicamento['dosis'] }}</td>
                    <td>{{ $medicamento['precio'] }} bs</td>
                    <td>
                        @if ($medicamento->tipos != null)

                            @foreach ($medicamento->tipos as $tipo)
                                <span class="badge badge-secondary">
                                    {{ $tipo->nombre }}
                                </span>
                            @endforeach

                        @endif
                    </td>
                    <td>
                        @if ($medicamento->presentacions != null)

                            @foreach ($medicamento->presentacions as $presentacion)
                                <span class="badge badge-secondary">
                                    {{ $presentacion->nombre }}
                                </span>
                            @endforeach

                        @endif
                    </td>
                    <td>
                        <a href="/medicamentos/{{ $medicamento['id'] }}"><i class="fa fa-eye"></i></a>

                        <a class="fas fa-edit" href="/medicamentos/{{$medicamento['id']}}/edit"></a>

                        <a href="#"  data-toggle="modal" data-target="#deleteModal" data-medicamentoid="{{$medicamento['id']}}" style="color:red"><i class="fas fa-trash-alt"></i></a>

                    </td>
                </tr>
                @endforeach

          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <!-- DELETE Modal-->
<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Select "delete" If you realy want to delete this medicamento.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="">
            @method('DELETE')
            @csrf
            {{-- <input type="hidden" id="role_id" name="role_id" value=""> --}}
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection
@section('js_medicamento_page')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var medicamento_id = button.data('medicamentoid')

        var modal = $(this)
        // modal.find('.modal-footer #role_id').val(role_id)
        modal.find('form').attr('action','/medicamentos/' + medicamento_id);
    })
</script>
@endsection
