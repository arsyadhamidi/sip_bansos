<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Landing | SIP-Bansos</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <link href="{{ asset('landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('images/logo.png') }}" alt="">
                <h1 class="sitename">SIP-Bansos</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#home" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#eligibility">Kelayakan</a></li>
                    <li><a href="#application">Pengajuan Bantuan</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li class="dropdown"><a href="#"><span>Informasi</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#news">Berita Terbaru</a></li>
                            <li><a href="#guidelines">Panduan</a></li>
                            <li class="dropdown"><a href="#"><span>Dokumen</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#forms">Formulir Pengajuan</a></li>
                                    <li><a href="#reports">Laporan Bantuan</a></li>
                                    <li><a href="#statistics">Statistik Bantuan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#contact">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="{{ route('login') }}" class="btn btn-primary text-white">
                    Login / Masuk
                </a>
            </div>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('images/background.jpeg') }}" alt="" data-aos="fade-in">

            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>Selamat Datang di Sistem Informasi Pelayanan Bansos Kelurahan Guguk Malintang</h2>
                        <p>Kami adalah tim yang berdedikasi untuk memberikan informasi dan layanan terbaik mengenai
                            bantuan sosial untuk masyarakat.</p>
                        <a href="{{ route('login') }}" class="btn-get-started">Mulai Sekarang</a>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- What We Do Section -->
        <section id="what-we-do" class="what-we-do section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Apa yang Kami Lakukan</h2>
                <p>Kami menyediakan informasi dan layanan terkait bantuan sosial untuk masyarakat yang membutuhkan.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box">
                            <h3>Kenapa Memilih Layanan Kami?</h3>
                            <p>
                                Kami berkomitmen untuk memberikan informasi yang akurat dan layanan yang cepat dalam
                                pengajuan bantuan sosial. Tim kami siap membantu Anda dalam setiap langkah.
                            </p>
                            <div class="text-center">
                                <a href="#services" class="more-btn"><span>Pelajari Lebih Lanjut</span> <i
                                        class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>Informasi Kelayakan</h4>
                                    <p>Kami memberikan informasi lengkap mengenai syarat dan kriteria untuk mendapatkan
                                        bantuan sosial.</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>Proses Pengajuan Mudah</h4>
                                    <p>Pengajuan bantuan sosial dapat dilakukan dengan mudah melalui platform kami,
                                        dengan panduan yang jelas.</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>Transparansi dan Akuntabilitas</h4>
                                    <p>Kami menjamin transparansi dalam proses pengajuan dan penyaluran bantuan sosial
                                        kepada masyarakat.</p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /What We Do Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang Kami</h2>
                <p>Kami berkomitmen untuk memberikan informasi dan layanan terbaik mengenai bantuan sosial kepada
                    masyarakat.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-3">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('images/background.jpeg') }}" alt="Gambar tentang kami"
                            class="img-fluid">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="about-content ps-0 ps-lg-3">
                            <h3>Visi dan Misi Kami</h3>
                            <p class="fst-italic">
                                Kami berusaha untuk memberikan akses yang lebih baik terhadap bantuan sosial bagi
                                masyarakat yang membutuhkan.
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-diagram-3"></i>
                                    <div>
                                        <h4>Memberikan Informasi yang Akurat</h4>
                                        <p>Kami menyediakan informasi yang jelas dan akurat mengenai syarat dan prosedur
                                            bantuan sosial.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-fullscreen-exit"></i>
                                    <div>
                                        <h4>Proses Pengajuan yang Mudah</h4>
                                        <p>Kami memastikan proses pengajuan bantuan sosial dapat dilakukan dengan mudah
                                            dan cepat.</p>
                                    </div>
                                </li>
                            </ul>
                            <p>
                                Kami percaya bahwa setiap individu berhak mendapatkan bantuan yang mereka butuhkan.
                                Dengan sistem yang transparan dan akuntabel, kami berkomitmen untuk membantu masyarakat
                                dalam mengakses bantuan sosial yang tepat.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row skills-content skills-animation">

                    <div class="col-lg-6">

                        <div class="progress">
                            <span class="skill"><span>Pengetahuan tentang Bantuan Sosial</span> <i
                                    class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div><!-- End Skills Item -->

                        <div class="progress">
                            <span class="skill"><span>Komunikasi Efektif</span> <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div><!-- End Skills Item -->

                        <div class="progress">
                            <span class="skill"><span>Manajemen Proyek</span> <i class="val">75%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div><!-- End Skills Item -->

                    </div>

                    <div class="col-lg-6">

                        <div class="progress">
                            <span class="skill"><span>Analisis Data</span> <i class="val">80%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div><!-- End Skills Item -->

                        <div class="progress">
                            <span class="skill"><span>Penggunaan Teknologi Informasi</span> <i
                                    class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div><!-- End Skills Item -->

                        <div class="progress">
                            <span class="skill"><span>Desain Komunikasi</span> <i class="val">55%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div><!-- End Skills Item -->

                    </div>

                </div>

            </div>

        </section><!-- /Skills Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="5000"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jumlah Penerima Bantuan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Program Bantuan Tersedia</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="12000"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jam Layanan Bantuan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Tim Pendukung</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan Kami</h2>
                <p>Kami menyediakan berbagai layanan untuk membantu masyarakat dalam mengakses bantuan sosial.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Informasi Kelayakan</h3>
                            </a>
                            <p>Kami memberikan informasi lengkap mengenai syarat dan kriteria untuk mendapatkan bantuan
                                sosial.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Proses Pengajuan Bantuan</h3>
                            </a>
                            <p>Kami memfasilitasi proses pengajuan bantuan sosial dengan panduan yang jelas dan mudah
                                diikuti.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Verifikasi Pengajuan</h3>
                            </a>
                            <p>Kami melakukan verifikasi terhadap pengajuan bantuan untuk memastikan keakuratan dan
                                kelayakan.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Tim Pendukung</h3>
                            </a>
                            <p>Tim kami siap membantu Anda dalam setiap langkah pengajuan dan memberikan dukungan yang
                                diperlukan.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Konsultasi Bantuan</h3>
                            </a>
                            <p>Kami menyediakan layanan konsultasi untuk membantu masyarakat memahami proses dan jenis
                                bantuan yang tersedia.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Monitoring dan Evaluasi</h3>
                            </a>
                            <p>Kami melakukan monitoring dan evaluasi terhadap program bantuan untuk memastikan
                                efektivitas dan transparansi.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Proyek Kami</h2>
                <p>Berikut adalah beberapa proyek dan inisiatif yang telah kami lakukan untuk membantu masyarakat dalam
                    mengakses bantuan sosial.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-bantuan">Bantuan Sosial</li>
                        <li data-filter=".filter-pendidikan">Pendidikan</li>
                        <li data-filter=".filter-kesehatan">Kesehatan</li>
                        <li data-filter=".filter-pemberdayaan">Pemberdayaan Masyarakat</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-bantuan">
                            <img src="assets/img/portfolio/bantuan-1.jpg" class="img-fluid" alt="Bantuan Sosial 1">
                            <div class="portfolio-info">
                                <h4>Bantuan Sosial 1</h4>
                                <p>Program bantuan untuk keluarga kurang mampu.</p>
                                <a href="assets/img/portfolio/bantuan-1.jpg" title="Bantuan Sosial 1"
                                    data-gallery="portfolio-gallery-bantuan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-pendidikan">
                            <img src="assets/img/portfolio/pendidikan-1.jpg" class="img-fluid" alt="Pendidikan 1">
                            <div class="portfolio-info">
                                <h4>Pendidikan 1</h4>
                                <p>Inisiatif pendidikan untuk anak-anak di daerah terpencil.</p>
                                <a href="assets/img/portfolio/pendidikan-1.jpg" title="Pendidikan 1"
                                    data-gallery="portfolio-gallery-pendidikan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-kesehatan">
                            <img src="assets/img/portfolio/kesehatan-1.jpg" class="img-fluid" alt="Kesehatan 1">
                            <div class="portfolio-info">
                                <h4>Kesehatan 1</h4>
                                <p>Program kesehatan untuk masyarakat yang kurang mampu.</p>
                                <a href="assets/img/portfolio/kesehatan-1.jpg" title="Kesehatan 1"
                                    data-gallery="portfolio-gallery-kesehatan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-pemberdayaan">
                            <img src="assets/img/portfolio/pemberdayaan-1.jpg" class="img-fluid"
                                alt="Pemberdayaan 1">
                            <div class="portfolio-info">
                                <h4>Pemberdayaan 1</h4>
                                <p>Program pemberdayaan masyarakat untuk meningkatkan keterampilan.</p>
                                <a href="assets/img/portfolio/pemberdayaan-1.jpg" title="Pemberdayaan 1"
                                    data-gallery="portfolio-gallery-pemberdayaan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio -details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-bantuan">
                            <img src="assets/img/portfolio/bantuan-2.jpg" class="img-fluid" alt="Bantuan Sosial 2">
                            <div class="portfolio-info">
                                <h4>Bantuan Sosial 2</h4>
                                <p>Inisiatif bantuan untuk penyintas bencana alam.</p>
                                <a href="assets/img/portfolio/bantuan-2.jpg" title="Bantuan Sosial 2"
                                    data-gallery="portfolio-gallery-bantuan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-pendidikan">
                            <img src="assets/img/portfolio/pendidikan-2.jpg" class="img-fluid" alt="Pendidikan 2">
                            <div class="portfolio-info">
                                <h4>Pendidikan 2</h4>
                                <p>Program beasiswa untuk pelajar berprestasi dari keluarga kurang mampu.</p>
                                <a href="assets/img/portfolio/pendidikan-2.jpg" title="Pendidikan 2"
                                    data-gallery="portfolio-gallery-pendidikan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-kesehatan">
                            <img src="assets/img/portfolio/kesehatan-2.jpg" class="img-fluid" alt="Kesehatan 2">
                            <div class="portfolio-info">
                                <h4>Kesehatan 2</h4>
                                <p>Program pemeriksaan kesehatan gratis untuk masyarakat.</p>
                                <a href="assets/img/portfolio/kesehatan-2.jpg" title="Kesehatan 2"
                                    data-gallery="portfolio-gallery-kesehatan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-pemberdayaan">
                            <img src="assets/img/portfolio/pemberdayaan-2.jpg" class="img-fluid"
                                alt="Pemberdayaan 2">
                            <div class="portfolio-info">
                                <h4>Pemberdayaan 2</h4>
                                <p>Pelatihan keterampilan untuk ibu-ibu di desa.</p>
                                <a href="assets/img/portfolio/pemberdayaan-2.jpg" title="Pemberdayaan 2"
                                    data-gallery="portfolio-gallery-pemberdayaan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-bantuan">
                            <img src="assets/img/portfolio/bantuan-3.jpg" class="img-fluid" alt="Bantuan Sosial 3">
                            <div class="portfolio-info">
                                <h4>Bantuan Sosial 3</h4>
                                <p>Distribusi sembako untuk masyarakat terdampak pandemi.</p>
                                <a href="assets/img/portfolio/bantuan-3.jpg" title="Bantuan Sosial 3"
                                    data-gallery="portfolio-gallery-bantuan" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
                <p>Berikut adalah beberapa testimoni dari masyarakat yang telah mendapatkan bantuan dari kami.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 40
                        },
                        "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 10
                        }
                    }
                }
            </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('landing/assets/img/testimonials/testimonials-1.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Ahmad S.</h3>
                                <h4>Penerima Bantuan</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Program bantuan sosial ini sangat membantu keluarga saya. Kami mendapatkan
                                        sembako dan dukungan yang sangat berarti.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('landing/assets/img/testimonials/testimonials-2.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Maria T.</h3>
                                <h4>Ibu Rumah Tangga</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Saya sangat berterima kasih atas bantuan yang diberikan. Ini sangat membantu
                                        anak-anak saya untuk mendapatkan pendidikan yang lebih baik.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('landing/assets/img/testimonials/testimonials-3.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Rudi K.</h3>
                                <h4>Wirausaha</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Program pemberdayaan masyarakat sangat membantu saya dalam mengembangkan usaha
                                        kecil saya. Terima kasih!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('landing/assets/img/testimonials/testimonials-4.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Linda P.</h3>
                                <h4>Mahasiswa</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class=" bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Bantuan beasiswa yang saya terima sangat membantu saya untuk melanjutkan
                                        pendidikan. Saya sangat bersyukur!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('landing/assets/img/testimonials/testimonials-5.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Fajar H.</h3>
                                <h4>Pekerja Sosial</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Program-program yang dijalankan sangat efektif dan memberikan dampak positif
                                        bagi masyarakat. Saya bangga menjadi bagian dari ini.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
                <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi kami melalui informasi di
                    bawah ini.</p>
            </div><!-- End Section Title -->

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Jl. Contoh No. 123, Jakarta, Indonesia</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Hubungi Kami</h3>
                                <p>+62 812 3456 7890</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Kirim Email</h3>
                                <p>info@bansos.org</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="500">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required="">
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="/" class="logo d-flex align-items-center">
                        <span class="sitename">SIP-Bansos</span>
                    </a>
                    <p>Kami berkomitmen untuk memberikan informasi dan layanan terbaik mengenai bantuan sosial untuk
                        masyarakat yang membutuhkan.</p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Tautan Berguna</h4>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">Syarat dan Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Layanan Kami</h4>
                    <ul>
                        <li><a href="#">Informasi Kelayakan</a></li>
                        <li><a href="#">Proses Pengajuan Bantuan</a></li>
                        <li><a href="#">Verifikasi Pengajuan</a></li>
                        <li><a href="#">Konsultasi Bantuan</a></li>
                        <li><a href="#">Monitoring dan Evaluasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p>Jl. Contoh No. 123</p>
                    <p>Jakarta, Indonesia</p>
                    <p class="mt-4"><strong>Telepon:</strong> <span>+62 812 3456 7890</span></p>
                    <p><strong>Email:</strong> <span>info@bansos.org</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">Sistem Informasi Bansos</strong> <span>Seluruh
                    Hak Dilindungi</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>

</body>

</html>
