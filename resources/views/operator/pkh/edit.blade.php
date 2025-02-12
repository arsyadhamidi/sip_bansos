@extends('dashboard.layout.master')
@section('title', 'Data PKH | SIBANSOS')
@section('menuDataPKH', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <h3>Edit Data PKH</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('data-pkh.index') }}" class="text-primary">Data PKH</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data PKH</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <form action="{{ route('data-pkh.update', $pkhs->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data-pkh.index') }}" class="btn btn-primary">
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
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Tanggal PKH</label>
                                        <input type="date" name="tgl_pkh"
                                            class="form-control @error('tgl_pkh') is-invalid @enderror"
                                            value="{{ old('tgl_pkh', \Carbon\Carbon::parse($pkhs->tgl_pkh)->format('Y-m-d')) }}">
                                        @error('tgl_pkh')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Penerima</label>
                                        <input type="text" name="penerima"
                                            class="form-control @error('penerima') is-invalid @enderror"
                                            value="{{ old('penerima', $pkhs->penerima ?? '-') }}" placeholder="Masukan nama penerima">
                                        @error('penerima')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>NIK</label>
                                        <input type="text" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('nik', $pkhs->nik ?? '-') }}" placeholder="Masukan nik">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>RT</label>
                                        <input type="text" name="rt"
                                            class="form-control @error('rt') is-invalid @enderror"
                                            value="{{ old('rt', $pkhs->rt ?? '') }}" placeholder="Masukan rt">
                                        @error('rt')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Status Penerimaan</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror"
                                            id="selectedStatus" style="width: 100%">
                                            <option value="">Pilih Status Penerima</option>
                                            <option value="1" {{ $pkhs->status == '1' ? 'selected' : '' }}>Sudah
                                                Diambil</option>
                                            <option value="2" {{ $pkhs->status == '2' ? 'selected' : '' }}>Belum
                                                Diambil</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="5"
                                            placeholder="Masukan alamat">{{ old('alamat', $pkhs->alamat ?? '-') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
            $('#selectedStatus').select2({
                theme: 'bootstrap4',
            });
        });
    </script>
@endpush
