@extends('layouts.dashboard')
@section('index')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container text-center">
        <div class="card">
            <div class="card-header">
                <h1>Selamat Datang Kembali</h1>
            </div>
            <div class="card-body">
                <p>Hello, {{ Auth()->user()->name }}!</p>
                <p>Selamat datang di dashboard Anda.</p>
                <button class="btn btn-primary" onclick="Posts()">Your News</button>
                <button class="btn btn-primary" onclick="Photos()">Your Photos</button>
                <button class="btn btn-primary" onclick="Pengaduan()">Your Report</button>
                <button class="btn btn-primary" onclick="RFC()">RFC</button>
    
                <script>
                    function Posts() {
                        window.location.href = "{{ url('posts') }}";
                    }

                    function Photos() {
                        window.location.href = "{{ url('photos') }}";
                    }

                    function Pengaduan() {
                        window.location.href = "{{ url('pengaduan') }}";
                    }

                    function RFC() {
                        window.location.href = "{{ url('rfc') }}";
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
