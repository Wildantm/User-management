@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register New User</h2>

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <div class="mb-3">
            <label for="npk" class="form-label">NPK</label>
            <input type="text" class="form-control" name="npk" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" name="nohp" required>
        </div>


        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button class="btn btn-primary">Register User</button>
    </form>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
