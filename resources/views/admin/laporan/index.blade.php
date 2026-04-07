<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Admin | PustakaDigital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .header p {
            color: #7f8c8d;
            font-size: 16px;
        }

        .report-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .report-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .report-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .report-icon.book {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .report-icon.user {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .report-icon.staff {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .report-icon.loan {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .report-icon.return {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .report-icon i {
            color: white;
            font-size: 24px;
        }

        .report-card h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .report-card p {
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .btn-print {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .btn-print:hover {
            background: #2980b9;
            color: white;
            text-decoration: none;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
        }

        .stat-label {
            font-size: 12px;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <div class="container">
        <div class="header">
            <h1><i class="fas fa-chart-line"></i> Laporan Sistem</h1>
            <p>Kelola dan cetak laporan data perpustakaan dalam format PDF</p>
        </div>

        <div class="report-grid">
            <!-- Laporan Buku -->
            <div class="report-card">
                <div class="report-icon book">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Laporan Data Buku</h3>
                <p>Daftar lengkap koleksi buku perpustakaan dengan detail lengkap</p>
                <a href="{{ route('laporan.buku') }}" class="btn-print" target="_blank">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Book::count() }}</div>
                        <div class="stat-label">Total Buku</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Book::where('stock', '>', 0)->count() }}</div>
                        <div class="stat-label">Tersedia</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Peminjam -->
            <div class="report-card">
                <div class="report-icon user">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Laporan Data Peminjam</h3>
                <p>Data lengkap pengguna yang terdaftar sebagai peminjam</p>
                <a href="{{ route('laporan.peminjam') }}" class="btn-print" target="_blank">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\User::count() }}</div>
                        <div class="stat-label">Total Peminjam</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\User::where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->count() }}</div>
                        <div class="stat-label">Bulan Ini</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Petugas -->
            <div class="report-card">
                <div class="report-icon staff">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Laporan Data Petugas</h3>
                <p>Daftar petugas perpustakaan yang aktif</p>
                <a href="{{ route('laporan.petugas') }}" class="btn-print" target="_blank">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Staff::count() }}</div>
                        <div class="stat-label">Total Petugas</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Staff::where('role', 'admin')->count() }}</div>
                        <div class="stat-label">Admin</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Peminjaman -->
            <div class="report-card">
                <div class="report-icon loan">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h3>Laporan Peminjaman</h3>
                <p>Riwayat lengkap aktivitas peminjaman buku</p>
                <a href="{{ route('laporan.peminjaman') }}" class="btn-print" target="_blank">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Peminjaman::count() }}</div>
                        <div class="stat-label">Total Pinjam</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Peminjaman::where('status', 'aktif')->count() }}</div>
                        <div class="stat-label">Aktif</div>
                    </div>
                </div>
            </div>

            <!-- Laporan Pengembalian -->
            <div class="report-card">
                <div class="report-icon return">
                    <i class="fas fa-undo"></i>
                </div>
                <h3>Laporan Pengembalian</h3>
                <p>Data pengembalian buku yang telah selesai</p>
                <a href="{{ route('laporan.pengembalian') }}" class="btn-print" target="_blank">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Peminjaman::where('status', 'dikembalikan')->count() }}</div>
                        <div class="stat-label">Dikembalikan</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ \App\Models\Peminjaman::where('status', 'dikembalikan')->where('tanggal_pengembalian', '>=', \Carbon\Carbon::now()->startOfMonth())->count() }}</div>
                        <div class="stat-label">Bulan Ini</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
