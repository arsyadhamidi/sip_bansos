@extends('dashboard.layout.master')
@section('title', 'Data Beras Cpp | SIBANSOS')
@section('menuDataBeras', 'active')

@section('content')
    <div class="row">
        <div class="col-lg">
            <h3>Data Beras Cpp</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="margin-left: -15px">
                    <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Beras Cpp</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 text-right my-2">
            <h5>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</h5>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="myTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Penerima</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>RT</th>
                                    <th>Status</th>
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
                    url: "{{ route('masyarakat-beras.index') }}",
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
                    }
                },
                columns: [{
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
                        data: 'status',
                        name: 'status',
                        defaultContent: '-',
                        render: function(data, type, row) {
                            var status = row.status;
                            if (status == '1') {
                                return '<span class="badge badge-success">Sudah Diambil</span>';
                            } else if (status == '2') {
                                return '<span class="badge badge-warning">Belum Diambil</span>';
                            } else {
                                return 'Belum';
                            }
                        }
                    },
                    {
                        data: 'tgl_beras',
                        name: 'tgl_beras',
                        defaultContent: '-',
                    },
                ],

                order: [
                    [1, 'desc']
                ]
            });

            // Define table variable
            let table = $('#myTable').DataTable();

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
@endpush
