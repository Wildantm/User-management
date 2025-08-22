@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Jabatan</h1>
    <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-3">Add Jabatan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Plant</th>
                <th>Departement</th>
                <th>Jabatan</th>
                <th>Lokasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jabatan as $jab)
            <tr>

                <td>{{ $jab->departement->plant->nama_plant ?? '-' }}</td> 
                <td>{{ $jab->departement->nama_departement }}</td>
                <td>{{ $jab->nama_jabatan ?? '-' }}</td>
                <td>{{ $jab->departement->plant->lokasi ?? '-' }}</td> 
                <td>
                   <a href="{{ route('jabatan.edit', $jab->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('jabatan.destroy', $jab->id) }}" method="POST" style="display:inline;">
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
