@extends('layouts.main')
@section('tiket')
<section>
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Cari Nomor Tiket</h4>
                    <hr>
                    <form action="cari_pengaduan" method="GET" class="mb-4">
                        @csrf
                        <div class="col-md-6 input-group mt-3 mt-md-0">
                            <input type="text" name="ticket_number" class="form-control"
                                id="searchTicketNumber" value="{{ old('ticket_number') }}"
                                placeholder="Masukkan Nomor Tiket">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary ml-2 mr-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="/formulir_pengaduan">Kembali</a>
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        @if ($Status === 'success' && isset($pengaduan) && count($pengaduan) > 0)
                            @foreach ($pengaduan as $complaint)
                                <div class="cardtiket">
                                    <h4>Tiket Pengaduan</h4>
                                    <div class="ticket-info">
                                        <p><strong>Nomor Tiket: </strong>
                                            {{ $complaint->ticket_number }}</p>
                                        <p><strong>Nama: </strong> {{ $complaint->name }}</p>
                                        <p><strong>No. Telepon: </strong> {{ $complaint->no_hp }}</p>
                                        <p><strong>Asal Dinas: </strong> {{ $complaint->opd }}
                                        </p>
                                        <p><strong>Isi Pengaduan: </strong>
                                            @if ($complaint->isi_pengaduan)
                                                {!! $complaint->isi_pengaduan !!}
                                            @endif
                                        </p>
                                        <p><strong>Lampiran: </strong>
                                        <div class="container">
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
                                        </div>
                                        </p>
                                        <p><strong>Status:</strong>
                                        <div class="container">
                                            @if ($complaint->status === 'Masuk')
                                                <button class="status btn btn-primary">Masuk</button>
                                            @elseif ($complaint->status === 'Proses')
                                                <button class="status btn btn-warning">Proses</button>
                                            @elseif ($complaint->status === 'Selesai')
                                                <button class="status btn btn-success">Selesai</button>
                                            @endif
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @elseif ($Status === 'not_found')
                            <!-- Tampilkan pesan jika tidak ada hasil pencarian -->
                            <p>Tidak ada hasil pencarian.</p>
                        @elseif ($Status === 'error')
                            <!-- Tampilkan pesan jika terjadi error dalam pencarian -->
                            <p>Data tidak ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection