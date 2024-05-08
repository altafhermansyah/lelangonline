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
                        <div class="row">
                            @foreach ($lelang as $l)
                                <div class="col-md-4">
                                    <div class="card m-3 border-primary shadow">
                                        <div class="card-header fw-bold">
                                            {{ $l->barang->nama_barang }}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Tanggal : {{ $l->tgl_lelang }}</li>
                                            <li class="list-group-item">Harga Awal :
                                                {{ 'Rp. ' . number_format($l->barang->harga_awal, 2, ',', '.') }}</li>
                                            <li class="list-group-item">Deskripsi : {{ $l->barang->deskripsi_barang }}</li>
                                        </ul>
                                        <div class="card-footer">
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <a href="" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#tawar{{ $l->id }}">Tawar</a>
                                            </div>
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
    <!-- Modal Tawar -->
    @foreach ($lelang as $l)
        <div class="modal fade" id="tawar{{ $l->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $l->barang->nama_barang }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('history.store', $l->id) }}" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="id_lelang" value="{{ $l->id }}" hidden>
                            <input type="text" class="form-control" name="id_barang" value="{{ $l->id_barang }}" hidden>
                            <input type="text" class="form-control" name="id_masyarakat"
                                value="{{ auth()->user()->id }}" hidden>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi Barang</label>
                                <input type="text" class="form-control" value="{{ $l->barang->deskripsi_barang }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga Awal</label>
                                <input type="text" class="form-control"
                                    value="{{ 'Rp. ' . number_format($l->barang->harga_awal, 2, ',', '.') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tawar Berapa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control @error('penawaran') is-invalid @enderror()"
                                        name="penawaran" placeholder="Masukkan Tawaranmu">
                                </div>

                                @error('penawaran')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Tawar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
