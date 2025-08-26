@extends('layouts.app')

@section('content')
<div class="container mt-5">

    {{-- Profil Pengguna --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="mb-1">{{ auth()->user()->name }}</h2>
                    <p class="mb-0">
                        {{ auth()->user()->jabatan->nama_jabatan ?? 'Jabatan belum diatur' }}<br>
                        {{ auth()->user()->npk }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigasi ke Modul --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Plant</h5>
                    <a href="{{ route('plant.index') }}" class="btn btn-primary" style="width:150px;">Go to Plant</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Departement</h5>
                    <a href="{{ route('departements.index') }}" class="btn btn-primary" style="width:150px;">Go to Departement</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Jabatan</h5>
                    <a href="{{ route('jabatan.index') }}" class="btn btn-primary" style="width:150px;">Go to Jabatan</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
