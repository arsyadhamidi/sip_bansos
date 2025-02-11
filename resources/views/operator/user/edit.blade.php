@extends('dashboard.layout.master')
@section('title', 'Data User | SIBANSOS')
@section('menuUserRegistrasi', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <h3>Edit Data User</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('data-user.index') }}" class="text-primary">Data User</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data User</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <form action="{{ route('data-user.update', $users->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data-user.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Simpan Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $users->name ?? '') }}" placeholder="Masukan nama lengkap">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username', $users->username ?? '') }}" placeholder="Masukan username">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Status Autentikasi</label>
                                            <select name="level" class="form-control @error('level') is-invalid @enderror"
                                                id="selectedLevel" style="width: 100%">
                                                <option value="" selected>Pilih Status Autentikasi</option>
                                                <option value="Operator" {{ $users->level == 'Operator' ? 'selected' : '' }}>Operator</option>
                                                <option value="Masyarakat" {{ $users->level == 'Masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                                            </select>
                                            @error('level')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#selectedLevel').select2({
                theme: 'bootstrap4',
            });
        });
    </script>
@endpush
