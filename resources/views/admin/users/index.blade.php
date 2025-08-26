@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.register') }}" class="btn btn-primary mb-3">+ Tambah User</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NPK</th>
                <th>Nama</th>
                <th>Tempat</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Plant</th>
                <td>Department</td>
                <td>Section</td>
                <td>Jabatan</td>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->npk }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->tempat_lahir }}</td>
                    <td>{{ $user->tanggal_lahir }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nohp }}</td>
                    <td>{{ $user->plant->nama_plant ?? '-' }}</td>
                    <td>{{ $user->departement->nama_departement ?? '-' }}</td>
                    <td>{{ $user->section->nama ?? '-'}}</td>
                    <td>{{ $user->jabatan->nama_jabatan ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>
                        {{-- Tombol edit/hapus bisa ditambahkan di sini --}}
                        <a href="{{ route('admin.users.edit', ['user' => $user->npk]) }}" class="btn btn-sm btn-warning mb-1">Edit</a>

                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
