<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Csirt</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Tambahkan link untuk FontAwesome dan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #3b5998;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">

                    @if (session()->has('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('sukses') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-3 fw-light fs-5">Masuk</h5>
                        <hr class="my-4">
                        @if (session('loginfail'))
                            <div id="countdown">
                                <p class="text-center">Anda mencoba terlalu banyak login. Silahkan tunggu dalam <span
                                        id="countdown-number">60</span> detik.</p>
                            </div>
                            <script>
                                // Fungsi untuk menghitung mundur
                                function countdown() {
                                    var countdownNumber = document.getElementById('countdown-number');
                                    var currentCount = parseInt(countdownNumber.textContent);
                                    if (currentCount > 0) {
                                        currentCount--;
                                        countdownNumber.textContent = currentCount;
                                        setTimeout(countdown, 1000); // Menunggu 1 detik sebelum mengurangi kembali
                                    } else {
                                        // Setelah hitungan mundur selesai, ganti pesan
                                        var countdownDiv = document.getElementById('countdown');
                                        countdownDiv.innerHTML = '<p class="text-center">Silahkan <a href="/auth">refresh</a> kembali.</p>';

                                    }
                                }

                                // Memulai hitungan mundur saat halaman dimuat
                                countdown();
                            </script>
                        @else
                            <form action="login" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email"
                                        class="form-control @error('email')
                                    is_invalid
                                @enderror"
                                        id="email" placeholder="name@example.com" autofocus required
                                        value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit"
                                        formaction="">Sign
                                        in</button>
                                </div>
                            </form>
                        @endif
                        <hr class="my-4">
                        <div class="text-center">Belum Punya Akun?
                            <a class="small" href="register">Buat Akun!</a><br>
                            <a href="/beranda" class="btn-justify-content-center mt-2 mb-4">Kembali Ke Menu
                                Awal</a>
                            Menu Awal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tambahkan script untuk Bootstrap JS (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
