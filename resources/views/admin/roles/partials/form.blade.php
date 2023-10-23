<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $role->name ?? '') }}" required placeholder="Ingrese el nombre del rol">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <div>
            <label for="permissions[]">Permisos</label>
        </div>
        <div class="row">
            @foreach ($permissions as $permission)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <fieldset class="form-group border p-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" data-on-color="success" type="checkbox" name="permissions[]" id="permissions" value="{{ $permission->id }}" {{ isset($role) ? ($role->permissions->contains($permission->id) ? 'checked' : '') : '' }}>
                                <span class="ml-2">{{ $permission->description }}</span>
                            </label>
                        </div>
                    </fieldset>
                </div>
            @endforeach
        </div>
        @error('roles[]')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
