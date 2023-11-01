@extends('layouts.dashboard')

@section('rfc-edit')
    <h1>Edit RFC</h1>

    @if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('rfc.update', ['rfc' => $rfc]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="text">Content</label>
            <textarea type="text" class="form-control" id="summernote" name="text" autofocus required>{{ $rfc->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save RFC</button>
    </form>
@endsection
