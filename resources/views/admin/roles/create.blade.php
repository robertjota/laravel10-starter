@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf

                @include('admin.roles.partials.form')

                <button class="btn btn-success float-right" type="submit">Crear rol</button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('admin.roles.index') }}">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
