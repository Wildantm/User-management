@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Plant</h1>
    <a href="{{ route('plant.create') }}" class="btn btn-primary mb-3">Add Plant</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Plant</th>
                <th>Lokasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plant as $p)
            <tr>
                <td>{{ $p->name ?? $p->nama_plant }}</td>
                <td>{{ $p->lokasi ?? $p->lokasi }}</td>
                <td>
                   <a href="{{ route('plant.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('plant.destroy', $p->id) }}" method="POST" style="display:inline;">
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
