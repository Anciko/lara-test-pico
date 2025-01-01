@extends('layout.app')

@section('content')
    <div class="my-4">
        <div class="card p-4 shadow">
            @if (Session::has('error'))
                {{ Session::get('error') }}
            @endif
            <form action="{{ route('submit.login') }}" method="POST">
                @csrf
                <div>
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mt-3">
                    <button class="btn btn-info " >submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
