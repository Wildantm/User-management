@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🔐 Manajemen Permissions User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NPK</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->npk }}</td>
                    <td>
                        @forelse($user->roles as $role)
                            <span class="badge bg-secondary">{{ $role->name }}</span>
                        @empty
                            <span class="text-muted">Tanpa Role</span>
                        @endforelse
                    </td>
                    <td style="max-width: 250px;">
                        @php
                        $allPermissions = $user->getAllPermissions();
                        @endphp
                        @forelse($allPermissions as $perm)
                            <span class="badge bg-info text-dark mb-1">{{ $perm->name }}</span>
                        @empty
                            <span class="text-muted">Tidak ada</span>
                        @endforelse

                    </td>
                    <td class="text-center">
                        <!-- Button: Open Modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPermission_{{ $user->npk }}">
                            ⚙️ Kelola
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Permission Modals -->
    @foreach($users as $user)
        <div class="modal fade" id="modalPermission_{{ $user->npk }}" tabindex="-1" aria-labelledby="modalLabel_{{ $user->npk }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('permissions.assign') }}" method="POST">
                        @csrf
                        <input type="hidden" name="npk" value="{{ $user->npk }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel_{{ $user->npk }}">🔧 Kelola Permission: {{ $user->name }} ({{ $user->npk }})</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="permissions[]"
                                                value="{{ $permission->name }}"
                                                id="perm_modal_{{ $user->npk }}_{{ $permission->id }}"
                                                {{ $user->permissions->contains('name', $permission->name) ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label small" for="perm_modal_{{ $user->npk }}_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
