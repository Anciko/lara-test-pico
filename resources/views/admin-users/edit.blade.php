@extends('layout.app')

@section('content')
    <h2>Edit admin</h2>
    <div>
        <form action="{{ route('admin-users.update', $adminUser->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control
                @error('name') is-invalid @enderror"
                value="{{ $adminUser->name ?? null }}"
                id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username"
                class="form-control"
                value="{{ $adminUser->username ?? null }}"
                id="username">
            </div>

            <div class="mb-3 form-check">
                <label class="form-label">Role</label>
                <select class="form-select" name="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if($role->id == $oldRole) selected @endif>{{ $role->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ $adminUser->phone ?? null }}"
                id="phone">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ $adminUser->email ?? null }}"
                id="email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control"
                value="{{ $adminUser->address ?? null }}"
                id="address">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender">
                    <option value="male" @if($adminUser->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if($adminUser->gender == 'female') selected @endif>Female</option>
                    <option value="other"  @if($adminUser->gender == 'other') selected @endif>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Status</label>
                <select class="form-select" name="is_active">
                    <option value="1" @if($adminUser->status == 1) selected @endif>Active</option>
                    <option value="0" @if($adminUser->status == 0) selected @endif>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
