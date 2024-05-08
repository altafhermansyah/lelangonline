@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="card shadow border-dark" style="background-color: #D4F2DB;">
                    <div class="card-header fs-6 text-white shadow fw-semibold" style="background-color: #255957">
                        Laporan</div>

                    <div class="card-body table-responsive">
                        <table class="table table-hover rounded table-bordered border-primary my-2">
                            <thead class="table-info border-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Tanggal Lelang</th>
                                    <th scope="col">Pemenang</th>
                                    <th scope="col">Harga Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($history as $no => $h)
                                    <tr>
                                        <th scope="row">{{ ++$no }}</th>
                                        <td>{{ $h->barang->nama_barang }}</td>
                                        <td>{{ $h->lelang->tgl_lelang }}</td>
                                        <td>{{ $h->masyarakat->nama_lengkap }}</td>
                                        <td>{{ 'Rp. ' . number_format($h->lelang->harga_akhir, 2, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <h3 class="text-center my-3">Data Belum Ada</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $history->links() }}
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="{{ route('history.create') }}" class="btn btn-outline-dark mt-5 btn-md">Cetak Laporan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
