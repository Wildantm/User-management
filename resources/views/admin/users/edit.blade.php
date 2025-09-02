{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Tombol buka modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
      Edit Profil
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editProfileLabel">Edit Profil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="{{ route('admin.user.edit', $user->npk) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-body">

              <div class="mb-3">
                  <label class="form-label">NPK</label>
                  <input type="text" name="npk" class="form-control" value="{{ old('npk', $user->npk) }}" readonly>
              </div>

              <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                  @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Plant</label>
                  <select name="plant_id" class="form-select @error('plant_id') is-invalid @enderror">
                      <option value="">-- Pilih Plant --</option>
                      @foreach($plants as $p)
                          <option value="{{ $p->id }}" {{ old('plant_id', $user->plant_id) == $p->id ? 'selected' : '' }}>
                              {{ $p->nama_plant }}
                          </option>
                      @endforeach
                  </select>
                  @error('plant_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Departemen</label>
                  <select name="departement_id" class="form-select @error('departement_id') is-invalid @enderror">
                      <option value="">-- Pilih Departemen --</option>
                      @foreach($departements as $departement)
                          <option value="{{ $departement->id }}" {{ old('departement_id', $user->departement_id) == $departement->id ? 'selected' : '' }}>
                              {{ $departement->nama_departement }}
                          </option>
                      @endforeach
                  </select>
                  @error('departement_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Jabatan</label>
                  <select name="jabatan_id" class="form-select @error('jabatan_id') is-invalid @enderror">
                      <option value="">-- Pilih Jabatan --</option>
                      @foreach($jabatan as $j)
                          <option value="{{ $j->id }}" {{ old('jabatan_id', $user->jabatan_id) == $j->id ? 'selected' : '' }}>
                              {{ $j->nama_jabatan }}
                          </option>
                      @endforeach
                  </select>
                  @error('jabatan_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Role</label>
                  <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                      <option value="">-- Pilih Role --</option>
                      @foreach($role as $r)
                          <option value="{{ $r->id }}" {{ old('role_id', $user->role_id) == $r->id ? 'selected' : '' }}>
                              {{ $r->role }}
                          </option>
                      @endforeach
                  </select>
                  @error('role_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                  @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                  @error('tempat_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                  @error('tanggal_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">No HP</label>
                  <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp', $user->nohp) }}">
                  @error('nohp')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">No BPJS</label>
                  <input type="text" name="no_bpjs" class="form-control @error('no_bpjs') is-invalid @enderror" value="{{ old('no_bpjs', $user->no_bpjs) }}">
                  @error('no_bpjs')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">No KTP</label>
                  <input type="text" name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" value="{{ old('no_ktp', $user->no_ktp) }}">
                  @error('no_ktp')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-3">
                  <label class="form-label">No NPWP</label>
                  <input type="text" name="no_npwp" class="form-control @error('no_npwp') is-invalid @enderror" value="{{ old('no_npwp', $user->no_npwp) }}">
                  @error('no_npwp')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection --}}
