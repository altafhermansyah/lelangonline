@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="nav nav-tabs rounded-top" role="tablist">
                    <li class="nav-item">
                        <a href="#login" class="nav-link fw-semibold text-reset active" data-bs-toggle="tab" role="tab"
                            aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#register" class="nav-link fw-semibold text-reset" data-bs-toggle="tab" role="tab"
                            aria-selected="false">Register</a>
                    </li>
                </div>
                <div class="card shadow" style="background-color: #D4F2DB">
                    <div class="card-header fs-6 text-white shadow fw-semibold" style="background-color: #255957">
                        Staff
                    </div>

                    <div class="card-body">
                        <div class="tab-content" role="tablist">
                            <div class="tab-pane active" id="login" role="tabpanel">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" role="tablist">
                            <div class="tab-pane" id="register" role="tabpanel">
                                <form method="POST" action="{{ route('petugas.regis') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end">Nama</label>

                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control @error('nama_petugas')
                                                is-invalid
                                                @enderror()"
                                                name="nama_petugas" placeholder="Masukkan Nama Petugas">


                                            @error('nama_petugas')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                        <div class="col-md-6">
                                            <input type="email"
                                                class="form-control @error('email')
                                                is-invalid
                                                @enderror()"
                                                name="email" placeholder="Masukkan Email Petugas">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror()"
                                                name="password" placeholder="Masukkan Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="level" class="col-md-4 col-form-label text-md-end">Level</label>

                                        <div class="col-md-6">
                                            <input type="hidden"
                                                class="form-control @error('level')
                                                is-invalid
                                                @enderror()"
                                                name="level" value="1">
                                            <input type="text"
                                                class="form-control @error('level')
                                                is-invalid
                                                @enderror()"
                                                value="Administrator" disabled>

                                            @error('level')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
