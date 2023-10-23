@extends('adminlte::page')

@section('title', 'Listado de Roles')

@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm float-right">Crear Rol</a>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Listado de Roles</h2>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="roles_table" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <th width="10px"></th>
                            <td>{{ $rol->name }}</td>
                            <td width="10px">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-warning btn-sm mr-1" data-toggle="tooltip"
                                       title='Editar' href="{{ route('admin.roles.edit', $rol) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.roles.destroy', $rol) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm show_confirm" type="submit" data-toggle="tooltip"
                                                title='Eliminar'><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        var info = "{{ session('info') }}";
        if (info) {
            Swal.fire({
                icon: 'success',
                title: '{{ session('info') }}',
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
        var t = $('#roles_table').DataTable({
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
