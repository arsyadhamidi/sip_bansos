@extends('dashboard.layout.master')
@section('title', 'Data PKH | SIBANSOS')
@section('menuDataPKH', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <h3>Data PKH</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data PKH</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg text-right my-2">
            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-upload"></i>
                Import PKH
            </button>
            <a class="btn btn-sm btn-success" id="generateexcel" target="_blank">
                <i class="fas fa-download"></i>
                Download Excel
            </a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('data-pkh.importpkh') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data PKH</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Import Data PKH</label>
                                    <input type="file" name="file" class="file-upload-default" hidden>
                                    <div class="input-group col-xs-12">
                                        <input type="text"
                                            class="form-control file-upload-info @error('file') is-invalid @enderror"
                                            disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-success"
                                                type="button">Upload</button>
                                        </span>
                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter Data PKH</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" class="form-control" id="searchByDate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('data-pkh.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Tambah Data PKH
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="myTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th width="3%">#</th>
                                    <th>Penerima</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>RT</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var startOfMonth = moment().startOf('month'); // Start of current month
            var endOfMonth = moment().endOf('month'); // End of current month

            $('#searchByDate').daterangepicker({
                startDate: startOfMonth,
                endDate: endOfMonth,
                locale: {
                    format: 'YYYY-MM-DD'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, function(start_date, end_date) {
                myTable.draw();
            });

            // Tampilkan Data
            let myTable = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, 100, 250],
                    [10, 25, 50, 100, 250]
                ],
                language: {
                    paginate: {
                        previous: 'Sebelumnya',
                        next: 'Selanjutnya'
                    }
                },
                ajax: {
                    url: "{{ route('data-pkh.index') }}",
                    data: function(data) {
                        // Mengambil informasi tentang halaman saat ini dari DataTables
                        data.start = data.start ||
                            0; // Untuk mengatasi 'start' undefined pada permintaan pertama
                        data.length = data.length ||
                            10; // Jika 'length' undefined, set 10 sebagai default

                        // Mendapatkan halaman berikutnya atau sebelumnya berdasarkan permintaan paging saat ini
                        data.page = Math.ceil(data.start / data.length) + 1;

                        // Setelah itu, Anda bisa melanjutkan dengan parameter pencarian atau filter lainnya
                        data.search = $('#myTable_filter input').val();

                        $('#generatepdf').attr('href', "#");
                        $('#generateexcel').attr('href', "#");

                        var startDate = $('#searchByDate').data('daterangepicker').startDate.format(
                            'YYYY-MM-DD');
                        var endDate = $('#searchByDate').data('daterangepicker').endDate.format(
                            'YYYY-MM-DD');
                        data.start_date = startDate;
                        data.end_date = endDate;

                        // Mengatur URL untuk export Excel dengan parameter filter
                        $('#generateexcel').attr('href',
                            "{{ route('data-pkh.generateexcel') }}?start_date=" + startDate +
                            "&end_date=" + endDate);
                    }
                },
                columns: [{
                        'className': 'details-control',
                        'orderable': false,
                        'data': null,
                        'defaultContent': ''
                    },
                    {
                        data: 'penerima',
                        name: 'penerima',
                        defaultContent: '-',
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        defaultContent: '-',
                    },
                    {
                        data: 'rt',
                        name: 'rt',
                        defaultContent: '-',
                    },
                    {
                        data: 'tgl_pkh',
                        name: 'tgl_pkh',
                        defaultContent: '-',
                    },
                ],

                order: [
                    [1, 'desc']
                ]
            });

            // Define table variable
            let table = $('#myTable').DataTable();

            // Handle click on details-control cells
            $('#myTable tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });

            // Handle click on "Expand All" button
            $('#btn-show-all-children').on('click', function() {
                // Enumerate all rows
                table.rows().every(function() {
                    // If row has details collapsed
                    if (!this.child.isShown()) {
                        // Open this row
                        this.child(format(this.data())).show();
                        $(this.node()).addClass('shown');
                    }
                });
            });

            // Handle click on "Collapse All" button
            $('#btn-hide-all-children').on('click', function() {
                // Enumerate all rows
                table.rows().every(function() {
                    // If row has details expanded
                    if (this.child.isShown()) {
                        // Collapse row details
                        this.child.hide();
                        $(this.node()).removeClass('shown');
                    }
                });
            });

            var editRoute = "{{ route('data-pkh.edit', ':id') }}"
            var deleteRoute = "{{ route('data-pkh.destroy', ':id') }}";

            function format(d) {
                // d is the original data object for the row

                var editUrl = editRoute.replace(':id', d.id);
                var deleteUrl = deleteRoute.replace(':id', d.id);
                return '<table>' +
                    '<tr>' +
                    '<td>Edit Data PKH :</td>' +
                    '<td><a href="' + editUrl +
                    '"class="btn btn-info"><i class="fa fa-edit"></i> &nbsp; Edit Data PKH</a></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Hapus Data PKH</td>' +
                    '<td><form action="' + deleteUrl + '" method="POST" id="dataForm">' +
                    '@csrf' +
                    '<button type="submit" class="btn btn-danger" id="hapusData"><i class="fa fa-times"></i> &nbsp; Hapus Data PKH</button>' +
                    '</form></td>' +
                    '</tr>' +
                    '</table>';
            }

        });
    </script>
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
        // Mendengarkan acara klik tombol hapus
        $(document).on('click', '#hapusData', function(event) {
            event.preventDefault(); // Mencegah perilaku default tombol

            // Ambil URL aksi penghapusan dari atribut 'action' formulir
            var deleteUrl = $(this).closest('form').attr('action');

            // Tampilkan SweetAlert saat tombol di klik
            Swal.fire({
                icon: 'info',
                title: 'Hapus Data PKH !',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                showCancelButton: true, // Tampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan jika pengguna mengkonfirmasi penghapusan
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX DELETE ke URL penghapusan
                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}" // Kirim token CSRF untuk keamanan
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus.',
                                showConfirmButton: false,
                                timer: 1500 // Durasi pesan success (dalam milidetik)
                            });

                            // Refresh halaman setelah pesan sukses ditampilkan
                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan pesan error jika penghapusan gagal
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                showConfirmButton: false,
                                timer: 1500 // Durasi pesan error (dalam milidetik)
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush
