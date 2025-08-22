@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Plant</h2>
    <form action="{{ route('plant.update', $plant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_plant" class="form-label">Nama Plant</label>
            <input type="text" name="nama_plant" class="form-control"
                   value="{{ old('nama_plant', $plant->nama_plant) }}" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi Plant</label>
            <input type="text" name="lokasi" class="form-control"
                   value="{{ old('lokasi', $plant->lokasi) }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('plant.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
