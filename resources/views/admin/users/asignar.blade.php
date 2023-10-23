@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Asignar un Rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.asignarUpdate', $user], 'method' => 'PATCH']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1', 'data-inverse' => 'true', 'data-size' => 'mini', 'data-on-color' => 'success', 'data-on-text' => 'SI', 'data-off-text' => 'NO']) !!}
                        <span class="ml-2">{{ $role->name }}</span>
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar rol', ['class' => 'btn btn-success mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
