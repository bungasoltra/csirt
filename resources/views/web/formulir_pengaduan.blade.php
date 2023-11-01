@extends('layouts.main')
@section('formulir_pengaduan')
    <!-- ======= Isi Halaman ======= -->
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Formulir Pengaduan</h2>
                    <ol>
                        <li><a href="layanan">Layanan</a></li>
                        <li>Formulir Pengaduan</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="form">
            @if (session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Formulir Pengaduan</h4>
                                <hr>
                                @if (session()->has('sukses'))
                                    <h5><b>Harap di ingat</b></h5>
                                    @foreach ($pengaduanReview as $complaint)
                                        <p>Nomor Pengaduan:{{ $complaint->ticket_number }}</p>
                                        <p>Nama:{{ $complaint->name }}</p>
                                        <p>No. Telepon:{{ $complaint->no_hp }}</p>
                                        <p>Asal Dinas:{{ $complaint->opd }}</p>
                                        <p>Isi Pengaduan: @if ($complaint->isi_pengaduan)
                                                {!! $complaint->isi_pengaduan !!}
                                            @endif
                                        </p>
                                        <p>
                                            @if ($complaint->lampiran)
                                                @php
                                                    $fileExtension = pathinfo($complaint->lampiran, PATHINFO_EXTENSION);
                                                @endphp

                                                @if (in_array($fileExtension, ['pdf', 'doc', 'docx']))
                                                    <a href="{{ asset('storage/pengaduan/' . $complaint->lampiran) }}"
                                                        target="_blank">Lihat
                                                        {{ strtoupper($fileExtension) }}</a>
                                                @elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                                    <img src="{{ asset('storage/pengaduan/' . $complaint->lampiran) }}"
                                                        alt="{{ $fileExtension }}" width="100">
                                                @else
                                                    <a href="{{ asset('storage/pengaduan/' . $complaint->lampiran) }}"
                                                        download>Unduh</a>
                                                @endif
                                            @else
                                                Tidak ada lampiran
                                            @endif
                                        </p>
                                        <hr>
                                    @endforeach
                                @else
                                    <form class="forms-pengaduan" action="/formulir_pengaduan" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-6 form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control mb-2" id="name"
                                                placeholder="Nama" autofocus required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="no_hp">No. Telepon</label>
                                            <input type="text" name="no_hp" class="form-control mb-2" id="no_hp"
                                                placeholder="No. Telepon" autofocus required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="opd">Asal OPD</label>
                                            <input type="text" id="opd" name="opd" class="form-control mb-2" list="pilih"
                                                placeholder="Pilih Asal Dinas" required>
                                            <datalist id="pilih">
                                                <option value="Badan Kesatuan Bangsa dan Politik">
                                                <option value="Badan Penanggulangan Bencana Daerah">
                                                <option value="Dinas Pemberdayaan Masyarakat dan Desa">
                                                <option value="Dinas Satpol PP">
                                                <option value="Dinas Kependudukan dan Pencatatan Sipil">
                                                <option value="Dinas Pemberdayaan Perempuan PA PP dan KB">
                                                <option value="Dinas Tenaga Kerja dan Transmigrasi">
                                                <option value="Dinas Pendidikan">
                                                <option value="Dinas Kesehatan">
                                                <option value="Dinas Pemuda dan Olahraga">
                                                <option value="Dinas Sosial">
                                                <option value="Dinas Kebudayaan">
                                                <option value="RSUD Achmad Mochctar">
                                                <option value="RSUD Pariaman">
                                                <option value="RSUD Ahmad-Yamin">
                                                <option value="Biro Pemerintahan dan Otda">
                                                <option value="Biro Hukum">
                                                <option value="Biro Kesejahteraan Rakyat">
                                                <option value="Dinas Bina Marga Cipta Karya dan Tata Ruang">
                                                <option value="Dinas Sumber Daya Air dan Bina Konstruksi">
                                                <option value="Dinas Perumahan Rakyat dan KPP">
                                                <option value="Dinas Lingkungan Hidup">
                                                <option value="Dinas Pangan">
                                                <option value="Dinas Koperasi dan UKM">
                                                <option value="Dinas Kelautan dan Perikanan">
                                                <option value="Dinas Perkebunan Tanaman Pangan dan Holtikultura">
                                                <option value="Dinas Peternakan dan Kesehatan Hewan">
                                                <option value="Dinas Kehutanan">
                                                <option value="Dinas Energi dan SDM">
                                                <option value="Dinas Perindustrian dan Perdagangan">
                                                <option value="Dinas Penanaman Modal dan PTSP">
                                                <option value="Dinas Perhubungan">
                                                <option value="Biro Perekonomian">
                                                <option value="Biro Administrasi Pembangunan">
                                                <option value="Biro Pengadaan Barang dan Jasa">
                                                <option value="Inspektorat">
                                                <option value="Badan Penelitian dan Pengembangan">
                                                <option value="Badan Pengelolaan Keuangan dan Aset Daerah">
                                                <option value="Badan Pendapatan Daerah">
                                                <option value="Badan Perencanaan Pembangunan Daerah">
                                                <option value="Badan Pengembangan SDM">
                                                <option value="Badan Kepegawaian Daerah">
                                                <option value="SETWAN">
                                                <option value="Dinas Komunikasi Informatika dan Statistik">
                                                <option value="Dinas Kearsipan dan Perpustakaan">
                                                <option value="Dinas Pariwisata">
                                                <option value="Badan Penghubung">
                                                <option value="Biro Organisasi">
                                                <option value="Biro Umum">
                                                <option value="Biro Administrasi Pimpinan">
                                            </datalist>
                                        </div>
                                        <div class=" col-md-6 form-group">
                                            <label for="lampiran">Lampiran:</label>
                                            <input type="file" id="lampiran" name="lampiran"
                                                class="form-control mb-2" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                                        </div>
                                        <div class="form-group">
                                            <label for="isi-pengaduan">Isi Pengaduan</label>
                                            <textarea class="form-control mb-2" name="isi-pengaduan" id="summernote" required></textarea>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                                            <br>
                                            <a href="/cari_pengaduan">Lihat Tiketmu</a>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
