@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold mb-4">Profile</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>NPK:</strong> {{ $user->npk }}</p>
            <p><strong>Plant:</strong> {{ $user->plant->nama_plant ?? '-' }}</p>
            <p><strong>Departemen:</strong> {{ $user->departement->nama_departement ?? '-' }}</p>
            <p><strong>Jabatan:</strong> {{ $user->jabatan->nama_jabatan ?? '-' }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>No. Telepon:</strong> {{ $user->nohp ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $user->alamat ?? '-' }}</p>
            <p><strong>Tanggal Bergabung:</strong> {{ $user->created_at->format('d M Y') }}</p>
            <p><strong>Terakhir Diperbarui:</strong> {{ $user->updated_at->format('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection
