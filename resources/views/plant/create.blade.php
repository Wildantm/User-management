@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Plant</h1>



<form action="{{ route('plant.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_plant" class="form-label">Nama Plant</label>
            <input type="text" name="nama_plant" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi Plant</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('plant.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
