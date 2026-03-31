<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pengembalian</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double #333;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 11px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid #333;
            padding: 6px 8px;
            text-align: left;
            font-size: 11px;
        }

        table th {
            background-color: #2563eb;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        table tbody tr:nth-child(even) {
            background-color: #f0f4ff;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
        }

        .total {
            margin-top: 10px;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Perpustakaan Digital</h2>
        <h3 style="margin:5px 0 0;">Laporan Data Pengembalian</h3>
        <p>Tanggal Cetak: {{ date('d-m-Y H:i:s') }}</p>
    </div>

    <div class="total">Total Pengembalian: {{ $data->count() }}</div>

    <table>
        <thead>
            <tr>
                <th style="width:30px">No</th>
                <th>No. Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="text-align:center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nomor_peminjaman }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->book->title ?? '-' }}</td>
                    <td style="text-align:center">{{ $item->tanggal_peminjaman }}</td>
                    <td style="text-align:center">{{ $item->tanggal_pengembalian }}</td>
                    <td style="text-align:center; color:#16a34a; font-weight:bold;">
                        {{ ucfirst($item->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak oleh: Admin Perpustakaan Digital</p>
    </div>
</body>

</html>
