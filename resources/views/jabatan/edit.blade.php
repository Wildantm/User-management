@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jabatan</h1>

    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Plant (readonly) -->
        <div class="mb-3">
            <label for="plant" class="form-label">Plant</label>
            <input type="text" class="form-control" 
                   value="{{ $jabatan->departement->plant->nama_plant ?? '-' }}" 
                   readonly>
        </div>

        <!-- Departement (readonly) -->

        <div class="mb-3">
            <label for="departement" class="form-label">Departement</label>
            <input type="text" class="form-control" 
                value="{{ $jabatan->departement->nama_departement ?? '-' }}" 
                readonly>
            <!-- Hidden input untuk tetap mengirim departement_id -->
            <input type="hidden" name="departement_id" value="{{ $jabatan->departement_id }}">
        </div>


        <!-- Nama Jabatan (editable) -->
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" 
                   value="{{ $jabatan->nama_jabatan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
