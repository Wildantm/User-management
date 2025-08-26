@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                <h2 class="mb-4" text-align="center">Employee Profile</h2>
        </div>
    </div>
</div>
        </div> 
        <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                <h3 class="mb-4">{{ auth()->user()->name }}</h3>
                <h4>{{ auth()->user()->jabatan->nama_jabatan ?? 'No Jabatan Assigned' }}</h4>
                <h4>{{ auth()->user()->npk }}</h4>
                <a href="{{ route('profile.show') }}" class="btn btn-warning">Profile Detail</a>
                </div>
            </div>
        </div>
    </div>       
    
     <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="text-left">
                <h3>Employee Info-----------------------</h3></div>
                <div class="text-center">
                <h3>{{ auth()->user()->plant->nama_plant ?? '-' }}</h3>
                <h4>{{ auth()->user()->plant->lokasi ?? '-'}}</h4>
                </div>
            </div>
        </div>
    </div>    
   
        <div class="mt-4">
            <a href="{{ route('admin.users.edit', $user->npk) }}" class="btn btn-warning">Edit Profil</a>
            <form action="{{ route('profile.destroy') }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus akun Anda?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus Akun</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    @endsection
