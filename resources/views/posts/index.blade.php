@extends('layouts.dashboard')
@section('all-posts')
    <h1 class="mt-4">News Posts</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Create New News</li>
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
                        <form method="POST" action="posts" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <div class="col-md-6 form-group">
                                <label for="judul">Title</label>
                                <input type="text" class="form-control" id="judul" name="judul" autofocus required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>

                            <div class="form-group">
                                <label class="custom-file-upload" for="gambar">Image</label><br />
                                <input class="form-control" type="file" name="gambar" id="gambar" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label for="isi">Content</label>
                                <textarea type="text" class="form-control" id="summernote" name="isi" autofocus required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Save News</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">View News</li>
    </ol>
    <!-- DataTales Post -->
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Your News</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="table-layout: fixed;" id="dataTable" width="auto"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>tanggal</th>
                                <th>Conten</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->judul }}</td>
                                    <td>{{ $post->tanggal }}</td>
                                    <td>
                                        @if ($post->isi)
                                            {!! $post->isi !!}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->gambar)
                                            <img src="{{ asset('storage/uploads/' . $post->gambar) }}" alt="Post Image"
                                                width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $post->status }}</td>
                                    <td>
                                        <a class="btn btn-primary mb-2"
                                            href="{{ route('posts.view', ['post' => $post]) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a class="btn btn-success mb-2"
                                            href="{{ route('posts.edit', ['post' => $post]) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')"><i
                                                    class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        @if ($post->status === 'Publish')
                                            <label for="" class="btn btn-success mb-2">Sudah
                                                Dipublikasikan</label>
                                        @else
                                            <form action="{{ route('posts.publish', ['id' => $post->id]) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success mb-2">Publish</button>
                                            </form>
                                        @endif
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
