<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LELANG PRO</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #FDFFFC">
    <div id="app">
        <nav class="navbar navbar-expand-lg p-3 navbar-dark" style="background-color: #011627">
            <div class="container">
                {{-- <a href="#" class="font-semibold fs-5 text-white">LELANG PRO</a> --}}
                <a class="navbar-brand fw-semibold fs-5 text-white" href="{{ url('/') }}">
                    LELANG PRO
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user()->id_level == 1)
                            <li class="nav-item me-3">
                                <a class="nav-link active {{ request()->url() === route('barang.index') ? 'fw-semibold' : ' ' }}"
                                    aria-current="page" href="{{ route('barang.index') }}">Barang</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active {{ request()->url() === route('user.index') ? 'fw-semibold' : ' ' }}"
                                    aria-current="page" href="{{ route('user.index') }}">Petugas</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active {{ request()->url() === route('history.index') ? 'fw-semibold' : ' ' }}"
                                    aria-current="page" href="{{ route('history.index') }}">Laporan</a>
                            </li>
                        @elseif(Auth::user()->id_level == 2)
                            <li class="nav-item me-3">
                                <a class="nav-link active {{ request()->url() === route('barang.index') ? 'fw-semibold' : ' ' }}"
                                    aria-current="page" href="{{ route('barang.index') }}">Barang</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active {{ request()->url() === route('lelang.index') ? 'fw-semibold' : ' ' }}"
                                    aria-current="page" href="{{ route('lelang.index') }}">Lelang</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active {{ request()->url() === route('history.index') ? 'fw-semibold' : ' ' }}"
                                    aria-current="page" href="{{ route('history.index') }}">Laporan</a>
                            </li>
                        @else
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page" href="">Barang</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('masyarakat.view') }}">Login Masyarakat</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                @if (Auth::user()->id_level == true)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->nama_petugas }}
                                    </a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->nama_lengkap }}
                                    </a>
                                @endif

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var statusSwitch = document.getElementById('statusSwitch');
    var labelSwitch = document.querySelector('label[for="statusSwitch"]');

    statusSwitch.addEventListener('change', function() {
        if (statusSwitch.checked) {
            statusSwitch.value = 'dibuka';
            labelSwitch.innerText = 'Dibuka';
        } else {
            statusSwitch.value = 'ditutup';
            labelSwitch.innerText = 'Ditutup';
        }
    });
</script>

</html>
