@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Jabatan</h1>

    {{-- Profil User --}}   
<form action="{{ route('jabatan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="departement_id" class="form-label">Departement</label>
    <select name="departement_id" class="form-control" required>
        <option value="">-- Pilih Departement --</option>
        @foreach($departements as $dept)
            <option value="{{ $dept->id }}">
            {{ $dept->nama_departement }} ({{ $dept->plant->nama_plant ?? '-'}})</option>
        @endforeach
    </select>
</div>
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
