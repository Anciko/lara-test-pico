@extends('layout.app')

@section('content')
    <div class="my-4">
        <a href="{{ route('admin-users.create') }}" class="btn btn-info">Create New Admin</a>
    </div>
    <div>
        @foreach ($admins as $admin)
            <div class="card p-3 mb-3">
                <p>Name: {{ $admin->name }} </p>
                <i>Role: {{ $admin->roleName() }} </i>
                <div>
                    <a href="{{ route('admin-users.edit', $admin->id) }}" class="btn btn-warning btn-sm">edit</a>
                    <form action="{{ route('admin-users.destroy', $admin->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
