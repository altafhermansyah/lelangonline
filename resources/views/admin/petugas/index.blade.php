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
                        Petugas</div>

                    <div class="card-body table-responsive">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+
                            Tambah Petugas</a>
                        <table class="table table-hover rounded table-bordered border-primary my-2">
                            <thead class="table-info border-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $no => $p)
                                    <tr>
                                        <th scope="row">{{ ++$no }}</th>
                                        <td>{{ $p->nama_petugas }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->level->level }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $p->id }}">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <h3 class="text-center my-3">Data Belum Ada</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $user->links() }}
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
                            <input type="text"
                                class="form-control @error('nama_petugas')
                            is-invalid
                            @enderror()"
                                name="nama_petugas" placeholder="Masukkan Nama Petugas">

                            @error('nama_petugas')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email')
                            is-invalid
                            @enderror()"
                                name="email" placeholder="Masukkan Email Petugas">

                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password"
                                class="form-control @error('password')
                            is-invalid
                            @enderror()"
                                name="password" placeholder="Masukkan Password">

                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Level</label>
                            <input type="hidden"
                                class="form-control @error('level')
                            is-invalid
                            @enderror()"
                                name="level" value="2">
                            <input type="text"
                                class="form-control @error('level')
                            is-invalid
                            @enderror()"
                                value="Petugas" disabled>

                            @error('level')
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
    @foreach ($user as $p)
        <div class="modal fade" id="delete{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Petugas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan menghapus data {{ $p->nama_petugas }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('user.destroy', $p->id) }}" method="POST">
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
