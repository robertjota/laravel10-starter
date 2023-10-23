@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                @csrf
                @method('PUT')
                {{-- {{ dd($rolePermissions) }} --}}
                @include('admin.roles.partials.form')

                <button class="btn btn-success float-right" type="submit">Actualizar rol</button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('admin.roles.index') }}">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
@stop
