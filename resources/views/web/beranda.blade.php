@extends('layouts.main')
@section('beranda')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <!-- Halaman pertama -->
                <div class="carousel-item active" style="background-image: url(assets/galeri/galeri3.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>CSIRT
                                    Sumbar</span></h2>
                            <!--<p class="animate__animated animate__fadeInUp"></p>-->
                            <a href="#RFC-2350" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Halaman pertama -->
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="berita" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Berita</h2>
                    <ol>
                        <li><a href="beranda">Beranda</a></li>
                        <li>Berita</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="services" class="services">
            <div class="container">
                <div class="row text">
                    @foreach ($publishPosts as $post)
                        <div class="col-md-auto">
                            <div class="icon-box">
                                <h3>{{ $post->judul }}</h3>
                                <hr>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <time datetime="{{ $post->tanggal }}">{{ $post->tanggal }}</time>
                                <br>
                                <div class="img-fluid rounded mt-2 d-flex justify-content-center align-items-center">
                                    @if ($post->gambar)
                                        <img src="{{ asset('storage/uploads/' . $post->gambar) }}" alt="Gambar Postingan"
                                            class="img-fluid rounded">
                                    @endif
                                </div>
                                <p>{!! nl2br($post->isi) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- ======= Breadcrumbs ======= -->
        <section id="foto" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Foto</h2>
                    <ol>
                        <li><a href="beranda">Beranda</a></li>
                        <li>Foto</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row portfolio-container">
                    @foreach ($publishPhotos as $photo)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <p class="text-center">{{ $photo->gambar_name }}</p>
                            <div class="portfolio-wrap">
                                @if ($photo->image)
                                    <img src="{{ asset('storage/galeri/' . $photo->image) }}" alt="Photos"
                                        class="img-fluid">
                                @else
                                    No Image
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/galeri/galeri3.jpg" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                                <img src="assets/galeri/galeri4.jpg" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                                <img src="assets/galeri/galeri5.jpeg" class="img-fluid" alt="">
                            </div>
                        </div> --}}
                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Breadcrumbs ======= -->
        <section id="RFC-2350" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>RFC-2350</h2>
                    <ol>
                        <li><a href="beranda">Beranda</a></li>
                        <li>RFC-2350</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="services" class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-13 mt-8 mt-md-8">
                        @foreach ($publishRfc as $rfc)
                            <div class="icon-box">
                                <h3>{{ $rfc->judul }}</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg><small><time datetime="{{ $rfc->created_at }}">{{ $rfc->created_at }}</time></small>
                                <hr>
                                @if ($rfc->text)
                                    {!! $rfc->text !!}
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
