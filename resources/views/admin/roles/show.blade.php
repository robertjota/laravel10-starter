@extends('adminlte::page')

@section('title', 'Mostrar Rol')

@section('content_header')
    <h1>Mostrar Rol</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-flush h-md-100 card-primary">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h3>Administrator</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-1">
                    <!--begin::Users-->
                    <div class="fw-bold text-gray-600 mb-5">Total users with this role: 5</div>
                    <!--end::Users-->

                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> All Admin Controls</div>
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> View and Edit Financial Summaries</div>
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> Enabled Bulk Reports</div>
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> View and Edit Payouts</div>
                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> View and Edit Disputes</div>

                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span> <em>and 7 more...</em></div>
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->

                <!--begin::Card footer-->
                <div class="card-footer flex-wrap pt-0">
                    <a href="/keen/demo1/../demo1/apps/user-management/roles/view.html" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>

                    <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Edit Role</button>
                </div>
                <!--end::Card footer-->
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        /* swal.fire(
                                                                'Buen Trabajo',
                                                                'esto es sweetalert2',
                                                                'success'
                                                            ) */
    </script>
@stop
