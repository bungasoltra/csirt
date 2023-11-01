@extends('layouts.dashboard')
@section('photo-post')
    <h1 class="mt-4">All Photos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Create New Photos</li>
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
                        <form method="POST" action="photos" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <div class="col-md-6 form-group">
                                <label for="name">Gambar Name</label>
                                <input type="text" class="form-control" id="name" name="name" autofocus required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="custom-file-upload" for="image">Image</label><br />
                                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                            </div>
                            <div class="form-group text-center">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Save Photo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">View Photos</li>
    </ol>
    <!-- DataTales Post -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Your Photos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="table-layout: fixed;" id="dataTable" width="auto"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Gambar Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($photos as $photo)
                                <tr>
                                    <td>{{ $photo->gambar_name }}</td>
                                    <td>
                                        @if ($photo->image)
                                            <img src="{{ asset('storage/galeri/' . $photo->image) }}" alt="Photos"
                                                width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $photo->status }}</td>
                                    <td>
                                        @if ($photo->status === 'publish')
                                            <label for="" class="btn btn-success mb-2">Sudah
                                                Dipublikasikan</label>
                                        @else
                                            <form action="{{ route('photos.publish', ['id' => $photo->id]) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success mb-2">Publish</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('photos.destroy', ['photo' => $photo->id]) }}" method="POST"
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
