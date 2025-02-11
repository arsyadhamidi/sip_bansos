@extends('dashboard.layout.master')
@section('title', 'Setting | SIBANSOS')
@section('content')
    <div class="row">
        <div class="col-lg">
            <h3>Setting</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Biodata
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg text-center">
                            <div class="mb-4">
                                @if (Auth()->user()->foto_profile)
                                    <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                        class="img-fluid rounded-circle"
                                        style="object-fit: cover; width:150px; height:150px">
                                @else
                                    <img src="{{ asset('images/profile.png') }}" class="img-fluid rounded-circle"
                                        width="150">
                                @endif
                            </div>
                            <div class="mb-3">
                                <h4>{{ Auth()->user()->name ?? '-' }}</h4>
                            </div>
                            <div class="mb-3">
                                <span class="text-muted">{{ Auth()->user()->level ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg">
                            <div class="mb-3">
                                <label><strong>Nama Lengkap</strong></label>
                                <p><i>{{ Auth()->user()->name ?? '-' }}</i></p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label><strong>Username</strong></label>
                                <p><i>{{ Auth()->user()->username ?? '-' }}</i></p>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label><strong>Status</strong></label>
                                <p><i>{{ Auth()->user()->level ?? '-' }}</i></p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Profile
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="border-bottom: none">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="true"
                                style="border: 1px solid gainsboro">Profile</button>
                            <button class="nav-link mx-2" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#username" type="button" role="tab" aria-controls="username"
                                aria-selected="false" style="border: 1px solid gainsboro">
                                Username
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#password"
                                type="button" role="tab" aria-controls="password" aria-selected="false"
                                style="border: 1px solid gainsboro">
                                Password
                            </button>
                            <button class="nav-link mx-2" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#gambar"
                                type="button" role="tab" aria-controls="gambar" aria-selected="false"
                                style="border: 1px solid gainsboro">
                                Foto Profile
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content mt-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <form action="{{ route('setting.updateprofile') }}" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', Auth()->user()->name ?? '-') }}"
                                                placeholder="Masukan nama lengkap">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan Data
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="username" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{ route('setting.updateusername') }}" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Username Lama</label>
                                            <input type="text" name="oldusername"
                                                class="form-control @error('oldusername') is-invalid @enderror"
                                                value="{{ old('oldusername', Auth()->user()->username ?? '-') }}"
                                                placeholder="Masukan username lama" readonly>
                                            @error('oldusername')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>New Username</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                value="{{ old('username') }}" placeholder="Masukan username baru">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save"></i>
                                                Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{ route('setting.updatepassword') }}" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukan password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" name="konfirmasipassword"
                                                class="form-control @error('konfirmasipassword') is-invalid @enderror"
                                                value="{{ old('konfirmasipassword') }}"
                                                placeholder="Masukan konfirmasi password">
                                            @error('konfirmasipassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save"></i>
                                                Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="gambar" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="{{ route('setting.updategambar') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label>Upload Gambar</label>
                                            <input type="file" name="foto_profile" class="file-upload-default" hidden>
                                            <div class="input-group col-xs-12">
                                                <input type="text"
                                                    class="form-control file-upload-info @error('foto_profile') is-invalid @enderror"
                                                    disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-success"
                                                        type="button">Upload</button>
                                                </span>
                                                @error('foto_profile')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save"></i>
                                                Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth()->user()->foto_profile)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg">
                                <h5>Hapus Foto Profile ?</h5>
                                <p class="mb-3">
                                    Apakah Anda yakin ingin menghapus foto profil Anda? Tindakan ini tidak dapat
                                    dibatalkan dan akan menghapus gambar yang saat ini ditetapkan sebagai gambar profil Anda.
                                </p>
                                <form action="{{ route('setting.deletegambar') }}" method="POST"
                                    enctype="multipart/form-data" id="dataForm">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Delete Gambar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });
    </script>
    <script>
        // Mendengarkan acara pengiriman formulir
        document.getElementById('dataForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir standar

            // Tampilkan SweetAlert saat formulir dikirim
            Swal.fire({
                icon: 'info',
                title: 'Hapus Foto Profile!',
                text: 'Apakah anda yakin untuk menghapus foto ini?',
                showCancelButton: true, // Menampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan ke tindakan berikutnya, misalnya mengirimkan formulir
                if (result.isConfirmed) {
                    // Memperoleh formulir
                    const form = document.getElementById('dataForm');
                    // Melanjutkan pengiriman formulir
                    form.submit();
                }
            });
        });
    </script>
@endpush
