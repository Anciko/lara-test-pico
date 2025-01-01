<div class="container my-3">
    <div class="d-flex justify-content-between">
        <div>
            <a href="{{ route('admin-users.index') }}" class="btn btn-info">Admins</a>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Roles and Permissions</a>
        </div>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
<hr>
</div>

