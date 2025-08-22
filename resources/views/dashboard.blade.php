@extends('layouts.app') {{-- pakai layout global Bootstrap --}}

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold h4">{{ __('Dashboard') }}</h2>
        </div>
    </div>


    <!-- Card Profile -->
    <div class="row justify-content-center mb-3">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Profile</h5>
                <a href="{{ route('profile.show') }}" class="btn btn-primary" style="width:150px;">Go to Profile</a>
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
