@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1>{{ auth()->user()->name }}</h1>
                <p> {{ auth()->user()->jabatan->nama_jabatan ?? 'No Jabatan Assigned' }}
                 </br>
                 {{ auth()->user()->npk }}</p>
            </div>
        </div>
    </div>

{{-- <a href="{{ route('users.profile.keluarga') }}">Data Keluarga</a> --}}{{-- pakai layout global Bootstrap --}}


    <!-- Card Profile -->   
    <div class="row justify-content-center mb-3">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Profile</h5>
                <a href="{{ route('admin.profile') }}" class="btn btn-primary" style="width:150px;">Lihat Profil</a>
            </div>
        </div>
    </div>
</div>

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
