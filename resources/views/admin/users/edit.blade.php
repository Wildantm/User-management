@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Profil</h2>

    <form action="{{ route('admin.profile.update', $user->npk) }}" method="POST">
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
                @foreach($plants as $p)
                    <option value="{{ $p->id }}" {{ old('plant_id', $user->plant_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_plant }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Departemen</label>
            <select name="departement_id" class="form-select">
                <option value="">-- Pilih Departemen --</option>
                @foreach($departements as $departement)
                    <option value="{{ $departement->id }}" {{ old('departement_id', $user->departement_id) == $departement->id ? 'selected' : '' }}>
                        {{ $departement->nama_departement }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan_id" class="form-select">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatan as $j)
                    <option value="{{ $j->id }}" {{ old('jabatan_id', $user->jabatan_id) == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="nohp" class="form-control" value="{{ old('nohp', $user->nohp) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">No BPJS</label>
            <input type="text" name="no_bpjs" class="form-control" value="{{ old('no_bpjs', $user->no_bpjs) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">No KTP</label>
            <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $user->no_ktp) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">No NPWP</label>
            <input type="text" name="no_npwp" class="form-control" value="{{ old('no_npwp', $user->no_npwp) }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
