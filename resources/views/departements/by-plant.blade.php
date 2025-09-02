@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Departement di {{ $plant->nama_plant }}</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Departement</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plant->departements as $dept)
                <tr>
                    <td>{{ $dept->nama_departement }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
