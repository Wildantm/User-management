@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Departement</h1>
    <form action="{{ route('departements.update', $departement->id) }}" method="POST">
    @csrf
    @method('PUT')
        @csrf

        <input type="text" name="nama_departement" 
       value="{{ $departement->nama_departement }}" class="form-control">

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('departements.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
