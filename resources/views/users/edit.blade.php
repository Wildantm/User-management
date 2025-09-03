@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Profil</h2>

    <form id="editProfileForm" action="{{ route('users.profile.update', $user->npk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NPK</label>
            <input type="text" name="npk" class="form-control" value="{{ old('npk', $user->npk) }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Plant</label>
            <select name="plant_id" class="form-select">
                <option value="">-- Pilih Plant --</option>
                @foreach($plants as $plant)
                    <option value="{{ $plant->id }}" 
                        {{ old('plant_id', $user->plant_id) == $plant->id ? 'selected' : '' }}>
                        {{ $plant->nama_plant }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Departemen</label>
            <select name="departement_id" class="form-select">
                <option value="">-- Pilih Departemen --</option>
                @foreach($departements as $departement)
                    <option value="{{ $departement->id }}" 
                        {{ old('departements_id', $user->departement_id) == $departement->id ? 'selected' : '' }}>
                        {{ $departement->nama_departement }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan_id" class="form-select">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->id }}" {{ old('jabatan_id', $user->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                        {{ $jabatan->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="nohp" class="form-control" value="{{ old('nohp', $user->nohp) }}">
        </div>

        <!-- Tombol Modal Trigger -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmSaveModal">
            Simpan Perubahan
        </button>
    </form>
</div>

<!-- Modal Konfirmasi Simpan -->
<div class="modal fade" id="confirmSaveModal" tabindex="-1" aria-labelledby="confirmSaveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Simpan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyimpan perubahan pada profil?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('editProfileForm').submit();">
                    Ya, Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
