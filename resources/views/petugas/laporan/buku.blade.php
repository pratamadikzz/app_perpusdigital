<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Buku - Petugas</title>
    <!-- Styles for the report page -->
    <style>
        /* Global page style */
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 30px;
        }

        /* Header section style */
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

        .info {
            margin-bottom: 15px;
            font-size: 11px;
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
            background-color: #1e40af;
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
    <!-- Report header with title and print timestamp -->
    <div class="header">
        <h2>PustakaDigital</h2>
        <h3 style="margin:5px 0 0;">Laporan Data Buku</h3>
        <p>Tanggal Cetak: {{ date('d-m-Y H:i:s') }}</p>
    </div>

    <!-- Summary section showing total number of books -->
    <div class="total">Total Buku: {{ $data->count() }}</div>

    <!-- Table section listing each book record -->
    <table>
        <thead>
            <tr>
                <th style="width:30px">No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th style="width:40px">Stok</th>
                <th>ISBN</th>
                <th style="width:50px">Tahun</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop through the data passed from the controller and render each book row --}}
            @foreach ($data as $item)
                <tr>
                    <td style="text-align:center">{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->publisher }}</td>
                    <td>{{ $item->category }}</td>
                    <td style="text-align:center">{{ $item->stock }}</td>
                    <td>{{ $item->isbn }}</td>
                    <td style="text-align:center">{{ $item->publication_year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer section with print author information -->
    <div class="footer">
        <p>Dicetak oleh: Petugas PustakaDigital</p>
    </div>
</body>

</html>