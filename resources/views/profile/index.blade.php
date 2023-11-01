@extends('layouts.dashboard')
@section('profile')
    <ol class="breadcrumb mb-4 mt-3 justify-content-center">
        <h4 class="breadcrumb-item active">Your Profile</h4>
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
    <hr>
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-6 mb-4">
                <div class="icon-box justify-content-center">
                    <div class="container justify-content-center">
                        <h3><i style="width: 100%" class="fas fa-user fa-fw fa-2xl"></i></h3>
                    </div>
                    <hr>
                    @csrf
                    <div>
                        <h5>Name:</h5>
                        <p class=""> {{ Auth::user()->name }}
                            <a class="ml-4" href="#" id="formname-toggle" data-target="formname-form"><i class="fa-solid fa-plus text-center"></i></a>
                        </p>
                        {{-- <form method="POST" action="/update/name" id="formname-form" class="form-hidden">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    id="name" placeholder="Nama Lengkap" autofocus value="{{ old('name') }}">
                                <label for="floatingInput">Nama Lengkap</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <hr>
                    <div>
                        <h5>Username:</h5>
                        <p>
                            {{ Auth::user()->username }}
                            <a class="ml-4" href="#" id="formusername"><i class="fa-solid fa-plus text-center"></i></a>
                        </p>
                        {{-- <form method="POST" action="/update/name">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="username"
                                    class="form-control @error('username')
                                    is-invalid
                                @enderror"
                                    id="username" placeholder="Username" autofocus value="{{ old('username') }}">
                                <label for="floatingInput">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <hr>
                    <div>
                        <h5>Email:</h5>
                        <p>
                            {{ Auth::user()->email }}
                            <a class="ml-4" href="#" id="formemail"><i class="fa-solid fa-plus text-center"></i></a>
                        </p>
                        {{-- <form method="POST" action="/update/name">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email"
                                    class="form-control @error('email')
                            is-invalid
                            @enderror"
                                    id="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold mt-2"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <div>
                        <h5>Password</h5>
                        <p>
                            {{ Auth::user()->password }}
                            <a class="ml-4" href="#" id="formpasswor"><i class="fa-solid fa-plus text-center"></i></a>
                        </p>
                        {{-- <form method="POST" action="/update/name">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password" autofocus>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="Password">
                                <label for="password_confirmation">Confirm Password</label>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold mt-2"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
