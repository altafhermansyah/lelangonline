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
                        Barang</div>

                    <div class="card-body table-responsive">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+
                            Tambah Data</a>
                        <table class="table table-hover rounded table-bordered border-primary my-2">
                            <thead class="table-info border-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Harga Awal</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barang as $no => $b)
                                    <tr>
                                        <th scope="row">{{ ++$no }}</th>
                                        <td>{{ $b->nama_barang }}</td>
                                        <td>{{ $b->tgl }}</td>
                                        <td>{{ 'Rp. ' . number_format($b->harga_awal, 2, ',', '.') }}</td>
                                        <td>{{ $b->deskripsi_barang }}</td>
                                        <td>
                                            <a href="" class="btn btn-secondary btn-sm m-1" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $b->id }}">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm m-1" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $b->id }}">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <h3 class="text-center my-3">Data Belum Ada</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $barang->links() }}
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <input type="text"
                                class="form-control @error('nama_barang')
                            is-invalid
                            @enderror()"
                                name="nama_barang" placeholder="Masukkan Nama Barang">

                            @error('nama_barang')
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
                                name="tgl" placeholder="Masukkan tanggal">

                            @error('tgl')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga Awal</label>
                            <input type="number"
                                class="form-control @error('harga_awal')
                            is-invalid
                            @enderror()"
                                name="harga_awal" placeholder="Masukkan Harga Awal">

                            @error('harga_awal')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Deskripsi Barang</label>
                            <input type="text"
                                class="form-control @error('deskripsi_barang')
                            is-invalid
                            @enderror()"
                                name="deskripsi" placeholder="Masukkan Deskripsi Barang">

                            @error('deskripsi_barang')
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
    <!-- Modal Edit -->
    @foreach ($barang as $b)
        <div class="modal fade" id="edit{{ $b->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('barang.update', $b->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror()"
                                    name="nama_barang" placeholder="Masukkan Nama Kelas"
                                    value="{{ old('nama_barang', $b->nama_barang) }}">

                                @error('nama_barang')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tgl') is-invalid @enderror()"
                                    name="tgl" placeholder="Masukkan Tanggal" value="{{ old('tgl', $b->tgl) }}">

                                @error('tgl')
                                    <div class="alert
                                    alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga Awal</label>
                                <input type="number" class="form-control @error('harga_awal') is-invalid @enderror()"
                                    name="harga_awal" placeholder="Masukkan Harga Awal"
                                    value="{{ old('harga_awal', $b->harga_awal) }}">

                                @error('harga_awal')
                                    <div class="alert
                                alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi Barang</label>
                                <input type="text"
                                    class="form-control @error('deskripsi_barang') is-invalid @enderror()"
                                    name="deskripsi" placeholder="Masukkan Kompetensi"
                                    value="{{ old('deskripsi_barang', $b->deskripsi_barang) }}">

                                @error('deskripsi_barang')
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
    <!-- Modal Delete -->
    @foreach ($barang as $b)
        <div class="modal fade" id="delete{{ $b->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan menghapus data {{ $b->nama_barang }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
