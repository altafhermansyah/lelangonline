@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('update'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-10">
                <div class="card shadow border-dark" style="background-color: #D4F2DB;">
                    <div class="card-header fs-6 text-white shadow fw-semibold" style="background-color: #255957">
                        LELANG</div>
                    <div class="card-body">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+
                            Tambah Barang Lelang</a>
                        <div class="row">
                            @foreach ($lelang as $l)
                                <div class="col-md-4">
                                    <div class="card m-3 border-primary shadow">
                                        <div class="card-header fw-bold">
                                            {{ $l->barang->nama_barang }}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Tanggal : {{ $l->tgl_lelang }}</li>
                                            <li class="list-group-item">Nama Petugas : {{ $l->users->nama_petugas }}</li>
                                            <li class="list-group-item">Pemenang :
                                                {{ $l->masyarakat->nama_lengkap ?? 'Belum Ada' }}</li>
                                            <li class="list-group-item">Harga Akhir : {{ $l->harga_akhir ?? 'Belum Ada' }}
                                            </li>
                                            <li class="list-group-item">Status : {{ $l->status }}</li>
                                        </ul>
                                        <div class="card-footer">
                                            <a href="" class="btn btn-sm m-1 btn-success" data-bs-toggle="modal"
                                                data-bs-target="#winner{{ $l->id }}">Pilih
                                                Pemenang</a>
                                            <a href=""
                                                class="btn btn-sm m-1 btn-dark {{ $l->status === 'ditutup' ? 'disabled' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#status{{ $l->id }}">Tutup
                                                Lelang</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $lelang->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Lelang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lelang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <select name="id_barang" class="form-select">
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>

                            @error('id_barang')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date"
                                class="form-control @error('tgl')
                        is-invalid
                        @enderror()"
                                name="tgl_lelang" placeholder="Masukkan tanggal">

                            @error('tgl_lelang')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Petugas</label>
                            <input type="hidden"
                                class="form-control @error('id_user')
                                is-invalid
                                @enderror()"
                                name="id_user" value="{{ Auth::user()->id }}">
                            <input type="text"
                                class="form-control @error('id_user')
                                is-invalid
                                @enderror()"
                                value="{{ Auth::user()->nama_petugas }}" disabled>

                            @error('id_user')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status Lelang</label>
                            <br>
                            {{-- <div class="mb-3">
                                <input class="form-check-input" type="radio" name="status" value="ditutup" checked>
                                <label class="form-check-label me-3">
                                    Ditutup
                                </label>
                                <input class="form-check-input" type="radio" name="status" value="dibuka">
                                <label class="form-check-label">
                                    Dibuka
                                </label>
                            </div> --}}
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch" name="status"
                                    value="dibuka" checked>
                                <label class="form-check-label" for="statusSwitch">Dibuka</label>
                            </div>
                            @error('status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    @foreach ($lelang as $l)
        <div class="modal fade" id="status{{ $l->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tutup Lelang Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan menutup lelang "{{ $l->barang->nama_barang }}"</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('lelang.update', $l->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-dark">tutup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Edit -->
    @foreach ($lelang as $l)
        <div class="modal fade" id="winner{{ $l->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Pemenang Lelang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('history.update', $l->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">List Tawaran</label>
                                <select
                                    class="form-select @error('id_masyarakat')
                                is-invalid
                                @enderror()"
                                    name="pemenang">
                                    <option selected>Pilih Pemenang</option>
                                    @foreach ($history as $h)
                                        <option value="{{ $h->id_masyarakat }} | {{ $h->penawaran }}">
                                            {{ $h->masyarakat->nama_lengkap }} |
                                            {{ 'Rp. ' . number_format($h->penawaran, 2, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('nama_barang')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
