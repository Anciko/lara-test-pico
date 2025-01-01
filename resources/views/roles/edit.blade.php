
@extends('layout.app')

@section('content')
    <h2>update role</h2>
    <div>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}">
            </div>

            <div class="mb-3 form-check">
                <label class="form-label">Permissions</label>

                <select class="form-select" name="permission_ids[]" multiple>
                    <?php foreach ($permissions as $permission): ?>


                    <option value="<?php echo $permission->id; ?>" @if(in_array($permission->id, $old_permissions))
                        selected
                        @endif ><?php echo $permission->name; ?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
