@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NPK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Plant</th>
                <td>Department</td>
                <td>Section</td>
                <td>Jabatan</td>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->npk }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nohp }}</td>
                    <td>{{ $user->plant->nama_plant ?? '-' }}</td>
                    <td>{{ $user->departement->nama_departement ?? '-' }}</td>
                    <td>{{ $user->section->nama ?? '-'}}</td>
                    <td>{{ $user->jabatan->nama_jabatan ?? '-' }}</td>
                    
                    <td>
                        {{-- Tombol edit/hapus bisa ditambahkan di sini --}}
                        <a href="{{ route('admin.users.edit', ['user' => $user->npk]) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                        <form action="{{ route('admin.users.destroy', ['user' => $user->npk]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                        </form>

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
