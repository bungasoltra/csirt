@extends('layouts.dashboard')
@section('rfc')
    <h1 class="mt-4">RFC</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Create New RFC</li>
    </ol>
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
                        <form method="POST" action="rfc" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Title</label>
                                <input type="text" class="form-control" id="judul" name="judul" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="text">Content</label>
                                <textarea type="text" class="form-control" id="summernote" name="text" autofocus required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Save RFC</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">View RFC</li>
    </ol>
    <!-- DataTales Post -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Your RFC</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="table-layout: fixed;" id="dataTable" width="auto"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rfcs as $rfc)
                                <tr>
                                    <td>{{ $rfc->judul }}</td>
                                    <td>
                                        @if ($rfc->text)
                                            {!! $rfc->text !!}
                                        @endif
                                    </td>
                                    <td>{{ $rfc->status }}</td>
                                    <td>
                                        <a class="btn btn-success mb-2" href="{{ route('rfc.edit', ['rfc' => $rfc]) }}">
                                            <i  class="fa-solid fa-pen-to-square"></i></a>
                                        @if ($rfc->status === 'publish')
                                            <label for="" class="btn btn-success mb-2">Sudah
                                                Dipublikasikan</label>
                                        @else
                                            <form action="{{ route('rfc.publish', ['id' => $rfc->id]) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success mb-2">Publish</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('rfc.destroy', ['rfc' => $rfc->id]) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')"><i
                                                    class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
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
