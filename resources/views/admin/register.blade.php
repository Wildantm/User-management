@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register New User</h2>

    {{-- ALERT: Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ALERT: Gagal (Validasi) --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <script>
        document.addEventListener('DOMContentLoaded', function () {

        const npkInput = document.getElementById('npk');   
        const npkError = document.getElementById('npk-error'); 
        const nohpInput = document.querySelector('input[name="nohp"]');
        nohpInput.addEventListener('input', function () {
            const value = this.value;
            const errorDiv = document.getElementById('nohp-error');

            // Validasi NPK (angka, max 20 digit)
            npkInput.addEventListener('input', function () {
                const value = this.value;
                if (!/^\d*$/.test(value)) {
                    npkError.textContent = 'NPK hanya boleh angka';
                    this.classList.add('is-invalid');
                } else if (value.length > 20) {
                    npkError.textContent = 'NPK maksimal 20 karakter';
                    this.classList.add('is-invalid');
                } else {
                    npkError.textContent = '';
                    this.classList.remove('is-invalid');
                }
            });
            
            // Cek jika bukan angka
            if (!/^\d*$/.test(value)) {
                errorDiv.textContent = 'Nomor HP hanya boleh angka';
                this.classList.add('is-invalid');
            } else if (value.length < 10 || value.length > 15) {
                errorDiv.textContent = 'Nomor HP harus 10–15 digit';
                this.classList.add('is-invalid');
            } else {
                errorDiv.textContent = '';
                this.classList.remove('is-invalid');
            }
        });
    });
</script>


        <div class="mb-3">
            <label for="npk" class="form-label">NPK</label>
            <input type="text" class="form-control" name="npk" id="npk" required value="{{ old('npk') }}">
            <div id="npk-error" class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" name="nohp" required value="{{ old('nohp') }}">
            <div id="nohp-error" class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button class="btn btn-primary">Register User</button>
    </form>
</div>
@endsection
