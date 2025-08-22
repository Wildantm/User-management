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

<select name="plant_id" class="form-control">
    @foreach($plant as $p)
        <option value="{{ $p->id }}" 
            {{ $departement->plant_id == $p->id ? 'selected' : '' }}>
            {{ $p->nama_plant }}
        </option>
    @endforeach
</select>
        
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('departements.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
