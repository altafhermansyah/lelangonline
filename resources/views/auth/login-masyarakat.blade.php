@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <div class="card shadow rounded-bottom" style="background-color: #D4F2DB">
                    <div class="card-header fs-6 text-white shadow fw-semibold rounded-0" style="background-color: #255957">
                        User
                    </div>
                    <div class="card-body">
                        <div class="tab-content" role="tablist">
                            <div class="tab-pane active" id="login" role="tabpanel">
                                <form method="POST" action="{{ route('masyarakat.login') }}">
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
                                <form method="POST" action="{{ route('masyarakat.store') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="nama-lengkap" class="col-md-4 col-form-label text-md-end">Nama
                                            Lengkap</label>

                                        <div class="col-md-6">
                                            <input id="nama_lengkap" type="nama_lengkap"
                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                                autocomplete="nama_lengkap" autofocus>

                                            @error('nama_lengkap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="telp" class="col-md-4 col-form-label text-md-end">No. Telp</label>

                                        <div class="col-md-6">
                                            <input id="telp" type="number"
                                                class="form-control @error('telp') is-invalid @enderror" name="telp"
                                                required>

                                            @error('telp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
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
