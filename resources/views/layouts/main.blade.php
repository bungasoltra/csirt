<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SumbarProv CSIRT - {{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .cardtiket {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 16px;
            width: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h4 {
            font-size: 18px;
        }

        .ticket-info {
            margin-top: 12px;
        }

        .attachment {
            color: #007bff;
            text-decoration: none;
        }

        .attachment:hover {
            text-decoration: underline;
        }

        .status {
            font-weight: bold;
            color: green;
        }
    </style>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Template Icons File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="/">CSIRT</a></h1>
            <a href="/" class="logo me-auto"><img src="assets/img/logocsirt.png" alt=""
                    class="img-fluid"></a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="beranda" class="{{ request()->is('beranda*') ? 'active' : '' }}">Beranda</a></li>
                    <li class="dropdown">
                        <a class="{{ request()->is('layanan*') ? 'active' : '' }}" href="#">
                            <span>Layanan</span> <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a class="{{ request()->is('formulir_pengaduan*') ? 'active' : '' }}"
                                    href="formulir_pengaduan">Formulir Pengaduan</a></li>
                            <li><a class="{{ request()->is('reaktif*') ? 'active' : '' }}" href="reaktif">Layanan
                                    Reaktif</a></li>
                            <li><a class="{{ request()->is('proaktif*') ? 'active' : '' }}" href="proaktif">Layanan
                                    Proaktif</a></li>
                            <li><a class="{{ request()->is('manajemen_kualitas_keamanan*') ? 'active' : '' }}"
                                    href="manajemen_kualitas_keamanan">Layanan Manajemen Kualitas Keamanan</a></li>
                            <li><a class="{{ request()->is('literasi_keamanan_informasi*') ? 'active' : '' }}"
                                    href="literasi_keamanan_informasi">Literasi Keamanan Informasi</a></li>
                        </ul>
                    </li>
                    <li><a class="{{ request()->is('beranda#berita*') ? 'active' : '' }}"
                            href="beranda#berita">Berita</a></li>
                    <li><a class="{{ request()->is('beranda#foto*') ? 'active' : '' }}" href="beranda#foto">Foto</a>
                    </li>
                    <li><a class="{{ request()->is('beranda#RFC-2350*') ? 'active' : '' }}"
                            href="beranda#RFC-2350">RFC-2350</a></li>
                    <li><a class="{{ request()->is('kontak*') ? 'active' : '' }}" href="kontak">Kontak</a></li>
                    <li><a href="#" class="getstarted">Start</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <hr>
    <div class="container">
        @yield('beranda')
        @yield('formulir_pengaduan')
        @yield('kontak')
        @yield('literasi_keamanan_informasi')
        @yield('manajemen_kualitas_keamanan')
        @yield('proaktif')
        @yield('reaktif')
        @yield('tiket')
    </div>
    <hr>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>CSIRT Sumbar</h3>
                            <p>
                                Jl. Pramuka Raya No.11A, Lolong Belanti, Kec. Padang Utara<br>
                                Kota Padang, Sumatera Barat<br><br>
                                <strong>Phone:</strong> (0751) 8971361<br>
                                <strong>Email:</strong> diskominfo@padang.go.id<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://twitter.com/KominfoSumbar" class="twitter"><i
                                        class="bx bxl-twitter"></i></a>
                                <a href="https://facebook.com/KominfotikSumbar" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/diskominfoprovsumbar/" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Berita Kami</h4>
                        <p>Belum banyak yang saya baca, tetapi kesalahan saya besar</p>
                        <form action="" method="post">
                            <input type="email" nasme="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>CSIRT Kominfo</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://instagram.com/rpl.sqd_ofc">Arga Abiyyu, Bunga Soltra Sumbari, Lisa Monica
                    Hazizah</a><br>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Gunakan Bootstrap JavaScript dari CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });
        });
    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        // Membersihkan daftar postingan yang sudah ada sebelum menampilkan yang baru
        $(document).ready(function() {
            $('#post-list').empty();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".baca-selengkapnya").click(function() {
                var postId = $(this).prev(".post-content").data("post-id");
                var postContent = $(this).prev(".post-content");

                // Buat permintaan AJAX untuk mengambil teks penuh dari post
                $.ajax({
                    url: "/ambil-teks-penuh/" + postId,
                    method: "GET",
                    success: function(response) {
                        postContent.html(response);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

</body>

</html>
