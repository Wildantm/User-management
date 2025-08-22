@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold mb-4">Profile</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>NPK:</strong> {{ $user->npk }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection
