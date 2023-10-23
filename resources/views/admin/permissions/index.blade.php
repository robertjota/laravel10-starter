@extends('adminlte::page')

@section('title', 'Listado de Permisos')

@section('plugins.Datatables', true)

@section('content_header')
@can('admin.permissions.create')
<a class="btn btn-primary btn-sm float-right" href="{{ route('admin.permissions.create') }}">Crear Permiso</a>
@endcan
<div class="row">
    <div class="col-lg-12 margin-tb">
        <h2>Listado de Permisos</h2>
    </div>
</div>
@stop

@section('content')
<div class="card">
    @if ($permissions->count())
    <div class="card-body">
        <table id="permisos_table" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <th width="10px"></th>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td width="10px">
                        <div class="btn-group" role="group">
                            @can('admin.permissions.edit')
                            <a class="btn btn-secondary btn-sm mr-1" data-toggle="tooltip" title='Editar' href="{{ route('admin.permissions.edit', $permission) }}"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('admin.permissions.destroy')
                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" title='Eliminar' type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="card-body">
        <strong>No hay registros</strong>
    </div>
    @endif
</div>
@stop
@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    var info = "{{ session('info') }}";
    if (info) {
        Swal.fire({
            icon: 'success',
            title: info,
            showConfirmButton: false,
            timer: 2500
        });
    }
</script>
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: 'Estás Seguro?',
            text: "Si lo eliminas, no se podra recuperar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
<script>
    var t = $('#permisos_table').DataTable({
        responsive: true,
        autoWidth: false,
        ordering: false,
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página.",
            zeroRecords: "No se encontró registro.",
            info: "  _START_ de _END_ (_TOTAL_ registros totales).",
            infoEmpty: "0 de 0 de 0 registros",
            infoFiltered: "(Encontrado de _MAX_ registros)",
            search: "Buscar: ",
            processing: "Procesando la información",
            paginate: {
                "first": " |< ",
                "previous": "Anterior",
                "next": "Siguiente",
                "last": " >| "
            }
        },
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: 0
        }],
        order: [
            [1, 'asc']
        ]
    });
    //para agregar numeración de filas
    t.on('order.dt search.dt', function() {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
            t.cell(cell).invalidate('dom');
        });
    }).draw();
</script>
@stop
