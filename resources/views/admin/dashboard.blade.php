<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin | Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --bg: #f8fafc;
            --surface: #ffffff;
            --text: #0f172a;
            --text-muted: #64748b;
            --border: #e5e7eb;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --radius: 12px;
            --transition: 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        .content {
            padding: 30px;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: var(--surface);
            padding: 24px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .card h4 {
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card span {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
        }

        /* Table */
        .table {
            background: var(--surface);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table h4 {
            padding: 24px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-size: 18px;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table h4 i {
            opacity: 0.9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th,
        td {
            padding: 16px 24px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        th {
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            color: var(--text-muted);
            font-size: 14px;
        }

        tbody tr {
            transition: var(--transition);
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .status-badge.status-aktif {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        .status-badge.status-menunggu {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-badge.status-dikembalikan {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .status-badge.status-selesai {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .status-badge.status-ditolak {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #dc2626;
            border: 1px solid #fca5a5;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .cards {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                gap: 16px;
            }

            .card {
                padding: 20px;
            }

            .card span {
                font-size: 24px;
            }

            .table h4 {
                padding: 20px;
                font-size: 16px;
            }

            th,
            td {
                padding: 12px 16px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .table h4 {
                font-size: 14px;
                padding: 16px;
            }

            th,
            td {
                padding: 10px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <div class="content">
        <div class="cards">
            <div class="card">
                <h4><i class="fas fa-book"></i> Total Buku</h4>
                <span>{{ $totalBuku }}</span>
            </div>
            <div class="card">
                <h4><i class="fas fa-tags"></i> Total Kategori</h4>
                <span>{{ $totalKategori }}</span>
            </div>
            <div class="card">
                <h4><i class="fas fa-users"></i> Total User</h4>
                <span>{{ $totalAkun }}</span>
            </div>
            <div class="card">
                <h4><i class="fas fa-book-open"></i> Dipinjam</h4>
                <span>{{ $dipinjam }}</span>
            </div>
            <div class="card">
                <h4><i class="fas fa-check-circle"></i> Dikembalikan</h4>
                <span>{{ $dikembalikan }}</span>
            </div>
            <div class="card">
                <h4><i class="fas fa-exclamation-triangle"></i> Terlambat</h4>
                <span>{{ $terlambat }}</span>
            </div>
        </div>

        <div class="table">
            <h4 style="color: white">Transaksi Terbaru</h4>
            <table>
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksiTerbaru as $transaksi)
                        <tr>
                            <td>{{ $transaksi->user->name ?? 'N/A' }}</td>
                            <td>{{ $transaksi->book->title ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_peminjaman)->format('d-m-Y') }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($transaksi->status) }}">
                                    {{ ucfirst($transaksi->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #64748b; padding: 20px;">
                                <i class="fas fa-inbox"></i> Belum ada transaksi peminjaman
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>

</body>

</html>
