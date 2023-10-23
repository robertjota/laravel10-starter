@extends('adminlte::page')

@section('title', __('Add permission'))

@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>{{ __('Add permission') }}</h2>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.permissions.store') }}">
                @csrf

                @include('admin.permissions.partials.form')

                <button class="btn btn-success float-right" type="submit">{{ __('Save') }}</button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('admin.permissions.index') }}">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
@stop
