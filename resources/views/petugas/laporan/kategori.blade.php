<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Kategori - PustakaDigital</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #003A9B;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #003A9B;
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            color: #666;
        }

        .info {
            margin-bottom: 20px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: #003A9B;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fa fa-tags"></i> LAPORAN DATA KATEGORI</h1>
        <p>PustakaDigital - Sistem Perpustakaan Digital</p>
        <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
    </div>

    <div class="info">
        <strong>Total Kategori:</strong> {{ $data->count() }} kategori
    </div>

    @if($data->count() > 0)
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Kategori</th>
                <th width="50%">Deskripsi</th>
                <th width="20%">Jumlah Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->deskripsi ?? '-' }}</td>
                <td>{{ $kategori->books_count }} buku</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="no-data">
        <p>Tidak ada data kategori yang tersedia.</p>
    </div>
    @endif

    <div class="footer">
        <p>Laporan ini dihasilkan oleh sistem PustakaDigital</p>
        <p>&copy; {{ date('Y') }} PustakaDigital. All rights reserved.</p>
    </div>
</body>
</html>