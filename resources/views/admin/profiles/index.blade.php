@extends('adminlte::page')

@section('title', 'Perfil')

<!-- Page Heading -->
@section('content_header')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>{{ __('Profile') }}</h2>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-4 order-lg-2">
            <div class="card shadow mb-4">
                <div class="text-center card-profile-image mt-4 ml-4">
                    <img id="frame" class="rounded-circle avatar img-fluid object-fit-cover"
                         src="{{ auth()->user()->profile_photo_path ? auth()->user()->profile_photo_path : env('APP_URL') . '/img/default-avatar.png' }}"
                         alt="">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('My Account') }}</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.profiles.update') }}" enctype="multipart/form-data"
                          autocomplete="new-password">
                        @csrf
                        @method('PUT')

                        <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">{{ __('Name') }}<span
                                                  class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name"
                                               placeholder="{{ __('Name') }}" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">{{ __('Email Address') }}<span
                                                  class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               placeholder="ejemplo@ejemplo.com"
                                               value="{{ old('email', Auth::user()->email) }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label"
                                               for="current_password">{{ __('Current Password') }}</label>
                                        <input type="password" id="current_password" class="form-control"
                                               name="current_password" placeholder="{{ __('Current Password') }}">
                                        @error('current_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label"
                                               for="new_password">{{ __('New Password') }}</label>
                                        <input type="password" id="new_password" class="form-control" name="new_password"
                                               placeholder="{{ __('New Password') }}" autocomplete="new-password">
                                        @error('new_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label"
                                               for="confirm_password">{{ __('Confirm Password') }}</label>
                                        <input type="password" id="confirm_password" class="form-control"
                                               name="confirm_password" placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                                        @error('confirm_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container col-lg-6">
                                    <div class="form-group">
                                        <div class="mb-5">
                                            <label for="file" class="form-label">Imagen de perfil</label>
                                            <input class="form-control" name="file" type="file" id="file"
                                                   accept="image/*" onchange="preview()">
                                            @error('file')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="clearImage()" type="submit"
                                            class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                position: 'top-end',
                icon: 'success',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 2500
            });
        }
    </script>

    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
        /* function clearImage() {
            document.getElementById('file').value = null;
            frame.src = "";
        } */
    </script>
@stop
