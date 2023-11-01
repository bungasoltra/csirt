<!DOCTYPE html>
<html>

<head>
    <title>Loading</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Favicons -->
    <style>
        /* CSS untuk animasi loading di judul halaman */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Menambahkan animasi pada judul halaman */
        @keyframes blink {

            0%,
            100% {
                content: "Loading...";
            }

            50% {
                content: "\200B";
                /* Ini adalah karakter whitespace nol lebar */
            }
        }

        /* Menerapkan animasi pada judul halaman */
        head:before {
            content: "Loading...";
            animation: blink 1s infinite steps(1);
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            margin: 0;
            /* Tambahkan untuk menghapus margin body bawaan browser */
        }

        /* CSS untuk animasi loading */
        .loader {
            display: inline-block;
            animation: spin 1s linear infinite;
        }
    </style>
    <script>
        const loadingDuration = 1000;

        function redirectToMainPage() {
            window.location.href = "beranda";
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(redirectToMainPage, loadingDuration);
        });
    </script>
</head>

<body>
    <!-- ======= Loading ======= -->
    <div id="preloader">
        <div id="status">
            <p>Selamat datang di csirt, silahkan tunggu sebentar</p>
        </div>
    </div>
    <!-- ======= End Loading ======= -->
</body>

</html>
