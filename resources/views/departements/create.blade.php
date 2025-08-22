@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Departement</h1>

    {{-- Profil User --}}   
<form action="{{ route('departements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="plant_id" class="form-label">Plant</label>
    <select name="plant_id" class="form-control" required>
        <option value="">-- Pilih Plant --</option>
        @foreach($plants as $p)
            <option value="{{ $p->id }}">{{ $p->nama_plant }}</option>
        @endforeach
    </select>
</div>
        <div class="mb-3">
            <label for="nama_departement" class="form-label">Nama Departement</label>
            <input type="text" name="nama_departement" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('departements.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
