<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin | Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

        <div class="content">
            <div class="cards">
                <div class="card">
                    <h4>Total Buku</h4>
                    <span>1.250</span>
                </div>
                <div class="card">
                    <h4>Total Kategori</h4>
                    <span>1.250</span>
                </div>
                <div class="card">
                    <h4>User</h4>
                    <span>320</span>
                </div>
                <div class="card">
                    <h4>Dipinjam</h4>
                    <span>87</span>
                </div>
                <div class="card">
                    <h4>Dikembalikan</h4>
                    <span>12</span>
                </div>
                <div class="card">
                    <h4>Terlambat</h4>
                    <span>12</span>
                </div>
            </div>

            <div class="table">
                <h4>Transaksi Terbaru</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Buku</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Andi</td>
                            <td>Algoritma</td>
                            <td>12-01-2026</td>
                            <td>Dipinjam</td>
                        </tr>
                        <tr>
                            <td>Siti</td>
                            <td>Basis Data</td>
                            <td>11-01-2026</td>
                            <td>Dikembalikan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
