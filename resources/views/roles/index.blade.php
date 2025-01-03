@extends('layout.app')

@section('content')
    @can('permission', 'create_user')
        <div class="my-4">
            <a href="{{ route('roles.create') }}" class="btn btn-info">Create New Role</a>
        </div>
    @endcan
    <div>
        @foreach ($roles as $role)
            <div class="card p-3">
                <p>{{ $role->name }}</p>
                @foreach ($role->permissions as $p)
                    <span class="badge badge-info mx-2">{{ $p->name }}</span>
                @endforeach
                <div>
                    @can('permission', 'update_role')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">edit</a>
                    @endcan

                    @can('delete_role')
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endcan

                </div>
            </div>
        @endforeach

    </div>
@endsection
