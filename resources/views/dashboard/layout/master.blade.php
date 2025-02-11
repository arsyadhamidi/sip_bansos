<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Base CSS -->
    <!-- Base JS -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery-min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/css/datatables-min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- Inline Style -->
    <style>
        #myTable td,
        #myTable th {
            line-height: 1.8;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="/dashboard"><img src="{{ asset('images/logo.png') }}"
                            alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src="{{ asset('images/logo.png') }}"
                            alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item nav-profile">
                        <a class="nav-link" href="/dashboard">
                            {{--  <span class="nav-profile-name">SIP-BANSOS</span>  --}}
                            <span class="nav-profile-name">TESTING</span>
                        </a>
                    </li>
                    <li class="nav-item nav-user-status">
                        <p class="mb-0">Terakhir login pada
                            {{ \Carbon\Carbon::parse(Auth()->user()->updated_login)->format('H:i') }}</p>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group navbar-search-master">
                            <input type="text" id="navbarSearch" class="form-control" placeholder="Search..."
                                aria-label="search" aria-describedby="search">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-danger" id="searchButton">
                                    <i class="typcn typcn-zoom"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Dropdown suggestions -->
                        <ul id="suggestionsList" class="dropdown-menu"
                            style="display:none; position: absolute; z-index: 1000;">
                            <!-- Suggestions will be added dynamically here -->
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right mr-lg-2">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                            @if (Auth()->user()->foto_profile)
                                <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}" alt="profile" />
                            @else
                                <img src="{{ asset('images/profile.png') }}" alt="profile" />
                            @endif
                            <span class="nav-profile-name">{{ Auth()->user()->name ?? '-' }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('setting.index') }}">
                                <i class="typcn typcn-cog-outline text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('login.logout') }}">
                                <i class="typcn typcn-eject text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('menuDashboard')" href="/dashboard">
                            <i class="typcn typcn-device-desktop menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    {{-- Admin --}}
                    @if (Auth()->user()->level == 'Operator')
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataPKH')" href="{{ route('data-pkh.index') }}">
                                <i class="typcn typcn-document-text menu-icon"></i>
                                <span class="menu-title">Data PKH</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataBPNT')" href="{{ route('data-bpnt.index') }}">
                                <i class="typcn typcn-attachment menu-icon"></i>
                                <span class="menu-title">Data BPNT</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataLansia')" href="{{ route('data-lansia.index') }}">
                                <i class="typcn typcn-clipboard menu-icon"></i>
                                <span class="menu-title">Data Lansia</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataBeras')" href="{{ route('data-beras.index') }}">
                                <i class="typcn typcn-shopping-cart menu-icon"></i>
                                <span class="menu-title">Data Beras CPP</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuUserRegistrasi')" href="{{ route('data-user.index') }}">
                                <i class="typcn typcn-user-outline menu-icon"></i>
                                <span class="menu-title">User Registrasi</span>
                            </a>
                        </li>
                        {{-- Masyarakat --}}
                    @elseif (Auth()->user()->level == 'Masyarakat')
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataPKH')" href="{{ route('masyarakat-pkh.index') }}">
                                <i class="typcn typcn-document-text menu-icon"></i>
                                <span class="menu-title">Data PKH</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataBPNT')" href="{{ route('masyarakat-bpnt.index') }}">
                                <i class="typcn typcn-attachment menu-icon"></i>
                                <span class="menu-title">Data BPNT</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataLansia')" href="{{ route('masyarakat-lansia.index') }}">
                                <i class="typcn typcn-clipboard menu-icon"></i>
                                <span class="menu-title">Data Lansia</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('menuDataBeras')" href="{{ route('masyarakat-beras.index') }}">
                                <i class="typcn typcn-shopping-cart menu-icon"></i>
                                <span class="menu-title">Data Beras CPP</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                                    {{ date('Y') }} RSKM Regina Eye Center.</span>
                                <span
                                    class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">version
                                    1.0.0</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script src="{{ asset('plugins/bootstrap/bootstrap-min.js') }}"></script>

    <!-- Plugin JS -->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert-min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/datatables-min.js') }}"></script>
    <script src="{{ asset('plugins/fabric/fabric-min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
    <script src="{{ asset('admin/js/typeahead.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

    @stack('custom-script')
    <!-- endinject -->
    <!-- End custom js for this page-->
</body>

</html>
