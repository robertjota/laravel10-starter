<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <label for="name">{{ __('Route') }}</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $permission->name ?? '') }}" required placeholder="{{ __('Enter permission path') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $permission->description ?? '') }}" required placeholder="{{ __('Enter permission description') }}">
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
