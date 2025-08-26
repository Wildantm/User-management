@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Departements</h1>
    <a href="{{ route('departements.create') }}" class="btn btn-primary mb-3">Add Departement</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Plant</th>
                <th>Departement</th>
                <th>Lokasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departements as $dept)
            <tr>

                <td>{{ $user->plant->nama_plant ?? '-' }}</td> 
                <td>{{ $user->name ?? $dept->nama_departement }}</td>
                <td>{{ $user->plant->lokasi ?? '-' }}</td> 
                <td>
                   <a href="{{ route('departements.edit', $dept->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('departements.destroy', $dept->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
