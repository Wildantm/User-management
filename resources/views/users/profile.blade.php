@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="mb-4">Employee Profile</h2>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="card">
            <div class="card-body text-center">
                <h3 class="mb-4">{{ auth()->user()->name }}</h3>
                <h4>{{ auth()->user()->jabatan->nama_jabatan ?? 'No Jabatan Assigned' }}</h4>
                <h4>{{ auth()->user()->npk }}</h4>
                <a href="{{ route('profile.show') }}" class="btn btn-warning">Profile</a>

                <!-- Modal Trigger -->
                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#employeeModal">
                    Lihat Detail
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalLabel">Detail Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>NPK:</strong> {{ auth()->user()->npk }}</p>
                    <p><strong>Jabatan:</strong> {{ auth()->user()->jabatan->nama_jabatan ?? '-' }}</p>
                    <p><strong>Plant:</strong> {{ auth()->user()->plant->nama_plant ?? '-' }}</p>
                    <p><strong>Lokasi:</strong> {{ auth()->user()->plant->lokasi ?? '-' }}</p>
                    {{-- Tambahkan info lainnya jika perlu --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="card">
            <div class="card-body text-center">
                <h3>Employee Info</h3>
                <hr>
                <h3>{{ auth()->user()->plant->nama_plant ?? '-' }}</h3>
                <h4>{{ auth()->user()->plant->lokasi ?? '-' }}</h4>
            </div>
        </div>
    </div>

    <div class="container mt-4 text-center">
        <a href="{{ route('users.edit') }}" class="btn btn-warning">Edit Profil</a>
        <form action="{{ route('profile.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus akun Anda?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus Akun</button>
        </form>
    </div>
@endsection
