@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manajemen Permissions User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        // Ambil user yang dipilih berdasarkan npk query param
        $npk = request('npk');
        $user = $users->firstWhere('npk', $npk);
    @endphp

    {{-- Form Pilih User --}}
    <form method="GET" action="{{ route('admin.permissions.index') }}" class="mb-4">
        <label for="npk" class="form-label">Pilih User (berdasarkan NPK):</label>
        <select name="npk" id="npk" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
            <option value="" disabled {{ $npk ? '' : 'selected' }}>-- Pilih User --</option>
            @foreach($users as $u)
                <option value="{{ $u->npk }}" {{ $npk == $u->npk ? 'selected' : '' }}>
                    {{ $u->name }} (NPK: {{ $u->npk }})
                </option>
            @endforeach
        </select>
    </form>

    @if($user)
    <div class="mb-4">
        <h4>Detail User:</h4>
        <ul>
            <li><strong>Nama:</strong> {{ $user->name }}</li>
            <li><strong>NPK:</strong> {{ $user->npk }}</li>
            <li><strong>Role:</strong>
                @forelse($user->roles as $role)
                    <span class="badge bg-primary">{{ $role->name }}</span>
                @empty
                    <span class="text-muted">Tanpa role</span>
                @endforelse
            </li>
            <li><strong>Permissions dari Role:</strong>
                @php
                    $inheritedPermissions = $user->getPermissionsViaRoles();
                @endphp
                @forelse($inheritedPermissions as $perm)
                    <span class="badge bg-info text-dark">{{ $perm->name }}</span>
                @empty
                    <span class="text-muted">Tidak ada</span>
                @endforelse
            </li>
        </ul>
    </div>

    {{-- Form Assign / Edit Permissions --}}
    <form action="{{ route('permissions.assign') }}" method="POST" class="mb-3">
        @csrf
        <input type="hidden" name="npk" value="{{ $user->npk }}">

        <h4>Edit Permissions (langsung ke User):</h4>

        <div class="row">
            @foreach($permissions as $permission)
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="permissions[]"
                               value="{{ $permission->name }}"
                               id="perm_{{ $permission->id }}"
                               {{ $user->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                        <label class="form-check-label" for="perm_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success mt-3">💾 Simpan Perubahan</button>
    </form>

    {{-- Form Hapus Semua Permissions --}}
    {{-- <form action="{{ route('permissions.revoke', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus semua permissions user ini?')">
        @csrf
        <button type="submit" class="btn btn-outline-danger">🗑️ Hapus Semua Permissions</button>
    </form> --}}
    @endif
</div>
@endsection
