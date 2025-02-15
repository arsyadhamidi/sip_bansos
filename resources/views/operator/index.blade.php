<div class="row">
    <div class="col-lg">
        <h3>Dashboard</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-left: -15px">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users Registrasi</h4>
                    <h1>{{ $countUsers ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PKH</h4>
                    <h1>{{ $countPkhs ?? '0'}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">BPNT</h4>
                    <h1>{{ $countBpnts ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LANSIA</h4>
                    <h1>{{ $countLansias ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beras CPP</h4>
                    <h1>{{ $countBeras ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>

    {{--  Sudah Diambil  --}}
    <div class="col-lg-12">
        <div class="my-4">
            <h3>Data Sudah Diambil</h3>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PKH</h4>
                    <h1>{{ $countSudahPkhs ?? '0'}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">BPNT</h4>
                    <h1>{{ $countSudahBpnts ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LANSIA</h4>
                    <h1>{{ $countSudahLansias ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beras CPP</h4>
                    <h1>{{ $countSudahBeras ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>

    {{--  Belum Diambil  --}}
    <div class="col-lg-12">
        <div class="my-4">
            <h3>Data Belum Diambil</h3>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PKH</h4>
                    <h1>{{ $countBelumPkhs ?? '0'}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">BPNT</h4>
                    <h1>{{ $countBelumBpnts ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">LANSIA</h4>
                    <h1>{{ $countBelumLansias ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beras CPP</h4>
                    <h1>{{ $countBelumBeras ?? '0' }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
