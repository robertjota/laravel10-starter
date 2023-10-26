@extends('adminlte::page')
@section('title', 'Dashboard')

@section('css')

@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        @can('admin.users.index')
            <div class="col-md-4">
                <x-adminlte-small-box title="3" text="Usuarios" icon="fas fa-user-plus"
                                      theme="primary" url="#" url-text="Ver listado de Usuarios" />
            </div>
        @endcan
        @can('admin.roles.index')
            <div class="col-md-4">
                <x-adminlte-small-box title="3" text="Roles" icon="fas fa-users-cog"
                                      theme="warning" url="#" url-text="Ver listado de Roles" />
            </div>
        @endcan
        @can('admin.permissions.index')
            <div class="col-md-4">
                <x-adminlte-small-box title="13" text="Permisos" icon="fas fa-lock"
                                      theme="info" url="#" url-text="Ver listado de Permisos" />
            </div>
        @endcan
    </div>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
