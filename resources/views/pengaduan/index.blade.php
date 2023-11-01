@extends('layouts.dashboard')
@section('pengaduan')
    <h1 class="mt-4">Pengaduan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengaduan Views</li>
    </ol>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaduan </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="table-layout: fixed;" id="dataTable" width="auto"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Tiket</th>
                                <th>Nama</th>
                                <th>No. Telepon</th>
                                <th>Asal Dinas</th>
                                <th>Isi Pengaduan</th>
                                <th>Lampiran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $complaint)
                                <tr>
                                    <td>{{ $complaint->ticket_number }}</td>
                                    <td>{{ $complaint->name }}</td>
                                    <td>{{ $complaint->no_hp }}</td>
                                    <td>{{ $complaint->opd }}</td>
                                    <td>
                                        @if ($complaint->isi_pengaduan)
                                            {!! $complaint->isi_pengaduan !!}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($complaint->lampiran)
                                            @php
                                                $fileExtension = pathinfo($complaint->lampiran, PATHINFO_EXTENSION);
                                            @endphp

                                            @if (in_array($fileExtension, ['pdf', 'doc', 'docx']))
                                                <a href="{{ asset('storage/pengaduan/' . $complaint->lampiran) }}"
                                                    target="_blank">Lihat {{ strtoupper($fileExtension) }}</a>
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
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            @if ($complaint->status == 'Masuk')
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="statusDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    {{ $complaint->status }}
                                                </button>
                                            @elseif ($complaint->status == 'Proses')
                                                <button class="btn btn-warning dropdown-toggle" type="button"
                                                    id="statusDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    {{ $complaint->status }}
                                                </button>
                                            @elseif ($complaint->status == 'Selesai')
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="statusDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    {{ $complaint->status }}
                                            @endif

                                            <div class="dropdown-menu" aria-labelledby="statusDropdown">
                                                @if ($complaint->status == 'Masuk')
                                                    <a class="dropdown-item"
                                                        href="{{ route('updateStatus', ['id' => $complaint->id, 'status' => 'Proses']) }}">Proses</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('updateStatus', ['id' => $complaint->id, 'status' => 'Selesai']) }}">Selesai</a>
                                                @elseif ($complaint->status == 'Proses')
                                                    <a class="dropdown-item"
                                                        href="{{ route('updateStatus', ['id' => $complaint->id, 'status' => 'Selesai']) }}">Selesai</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
