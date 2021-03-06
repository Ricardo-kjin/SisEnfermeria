@extends('admin.layouts.dashboard')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Service List</h2>
    </div>
    <div class="col-md-6">
        <a href="/instrumentos/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo instrumento</a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Table
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Tools</th>
            </tr>
          </tfoot>
          <tbody>

                @foreach ($instrumentos as $instrumento)
                <tr>
                    <td>{{ $instrumento['id'] }}</td>
                    <td>{{ $instrumento['nombre'] }}</td>

                    <td>{!! getShorterString($instrumento['descripcion'],40) !!}</td>

                    <td>


                        <a class="fas fa-edit" href="/instrumentos/{{$instrumento['id']}}/edit"></a>

                        <a href="#"  data-toggle="modal" data-target="#deleteModal" data-instruid="{{$instrumento['id']}}" style="color:red"><i class="fas fa-trash-alt"></i></a>

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
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">Select "DELETE" if you are realy to delete this instrumento.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form method="POST" action="/instrumentos/{{$instrumento->id}}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="instrumento_id" name="instrumento_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">DELETE</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js_instrumento_page')

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var instrumento_id = button.data('instruid')
           // console.log(instrumento_id);
          var modal = $(this)
          //modal.find('.modal-title').text('New message to ' + instrumento_id)
          modal.find('.modal-footer #instrumento_id').val(instrumento_id)
        })
    </script>
@endsection
