@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manajemen User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NPK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Plant</th>
                <th>Departement</th>
                <th>Jabatan</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->npk }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nohp ?? '-' }}</td>
                <td>{{ $user->plant->nama_plant ?? '-' }}</td>
                <td>{{ $user->departement->nama_departement ?? '-' }}</td>
                <td>{{ $user->jabatan->nama_jabatan ?? '-' }}</td>
                <td>
                    <span class="badge bg-{{ $user->hasRole('admin') ? 'primary' : 'secondary' }}">
                        {{ ucfirst($user->getRoleNames()->first() ?? 'Unknown') }}
                    </span>
                </td>
                <td>
                @if(auth()->user()->hasRole('admin'))
                    <form action="{{ route('admin.users.toggle-active', ['user' => $user->npk]) }}" method="POST" id="toggle-form-{{ $user->npk }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="switchCheck_{{ $user->npk }}"
                                {{ $user->is_active ? 'checked' : '' }}
                                onchange="document.getElementById('toggle-form-{{ $user->npk }}').submit();"
                            >
                            <label class="form-check-label small" for="switchCheck_{{ $user->npk }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </label>
                        </div>
                    </form>
                @else
                    <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-secondary' }}">
                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                    </span>
                @endif
            </td>

                <td>
                    <!-- Tombol buka modal -->
                    <button type="button" class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal-{{ $user->npk }}">
                        Edit
                    </button>

                    <!-- Form hapus -->
                    <form action="{{ route('admin.users.destroy', ['user' => $user->npk]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit User -->
            <div class="modal fade" id="editModal-{{ $user->npk }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $user->npk }}" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Profil - {{ $user->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                          </div>
                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="nohp" class="form-control" value="{{ $user->nohp }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Plant</label>
                            <select name="plant_id" class="form-select">
                                @foreach($plants as $p)
                                    <option value="{{ $p->id }}" {{ $user->plant_id == $p->id ? 'selected' : '' }}>{{ $p->nama_plant }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Departement</label>
                            <select name="departement_id" class="form-select">
                                @foreach($departements as $d)
                                    <option value="{{ $d->id }}" {{ $user->departement_id == $d->id ? 'selected' : '' }}>{{ $d->nama_departement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan_id" class="form-select">
                                @foreach($jabatan as $j)
                                    <option value="{{ $j->id }}" {{ $user->jabatan_id == $j->id ? 'selected' : '' }}>{{ $j->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ ( old('role') ?? $user->getRoleNames()->first()) == $role->name ? 'selected' : '' }}>
                                        {{ \Illuminate\Support\Str::title(str_replace('_', ' ', $role->name)) }}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                           <label class="form-label">Status</label>
                            <select name="is_active" class="form-select">
                            <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            @empty
            <tr>
                <td colspan="13" class="text-center">Belum ada pengguna.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
