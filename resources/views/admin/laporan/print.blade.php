<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LELANG PRO - Cetak PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f2f6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        table th {
            background-color: #3498db;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan History Lelang</h1>
        <table class="table">
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
    </div>
</body>

</html>
