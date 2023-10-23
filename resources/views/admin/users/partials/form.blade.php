<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" required placeholder="{{ __('Name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email Address') }}</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" required placeholder="{{ __('Email Address') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input class="form-control" type="password" name="password" id="password" autocomplete="new-password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password">{{ __('Confirm Password') }}</label>
            <input class="form-control" type="password" name="confirm-password" id="confirm-password" autocomplete="new-password">
            @error('confirm-password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div>
                <label for="roles[]">Seleccionar Roles</label>
            </div>
            @foreach ($roles as $role)
                <div style='display:inline-block'>
                    <label class="mr-3">
                        <input class="mr-1" data-inverse="true" data-size="mini" data-on-color="success" data-on-text="SI" data-off-text="NO" type="checkbox" name="roles[]" id="roles" value="{{ $role->id }}" {{ isset($userRole) ? (in_array($role->id, $userRole) ? 'checked' : '') : '' }}>
                        <span class="ml-2">{{ $role->name }}</span>
                    </label>
                </div>
            @endforeach
            @error('roles[]')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
