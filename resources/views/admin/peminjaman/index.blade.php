<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Admin | PustakaDigital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .page-content {
            margin-left: 290px;
            transition: margin-left 0.3s ease;
        }

        .content {
            padding: 30px;
            min-height: 100vh;
        }

        .page-header {
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h2 {
            margin: 0;
            color: #1e293b;
            font-weight: 700;
            font-size: 28px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .btn-custom {
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-success-custom {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            color: white;
        }

        .btn-success-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 222, 128, 0.4);
            color: white;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: none;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 25px;
        }

        .card-header h5 {
            margin: 0;
            color: #334155;
            font-weight: 600;
            font-size: 18px;
        }

        .card-body {
            padding: 0;
        }

        /* Search and Filter */
        .table-controls {
            padding: 20px 25px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 45px 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-box .search-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .search-box .search-btn:hover {
            color: #667eea;
        }

        .filter-box {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-select {
            padding: 8px 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .stats-info {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #64748b;
        }

        .stat-number {
            font-weight: 700;
            color: #1e293b;
        }

        /* Table */
        .table-responsive {
            padding: 0;
        }

        .table {
            margin: 0;
            font-size: 14px;
        }

        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 15px 20px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        /* Loan Info */
        .loan-number {
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
        }

        .loan-date {
            color: #64748b;
            font-size: 12px;
        }

        .user-info h6 {
            margin: 0;
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
        }

        .user-info p {
            margin: 2px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .book-info h6 {
            margin: 0;
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
        }

        .book-info p {
            margin: 2px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-pending {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .status-aktif {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .status-ditolak {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .status-dikembalikan {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .status-selesai {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #3730a3;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-action {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-approve {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            color: white;
        }

        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
            color: white;
        }

        .btn-reject {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #64748b;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        .empty-state h5 {
            margin-bottom: 8px;
            color: #475569;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-content {
                margin-left: 0;
            }

            .page-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .table-controls {
                flex-direction: column;
                gap: 15px;
            }

            .search-box {
                max-width: 100%;
            }

            .filter-box {
                width: 100%;
                justify-content: center;
            }

            .stats-info {
                justify-content: center;
                flex-wrap: wrap;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>

    @include('components.sidebar')
    @include('components.navbar')

    <div class="page-content">
        <div class="content">

            <div class="page-header">
                <h2><i class="fas fa-book-open text-primary me-3"></i>Data Peminjaman</h2>
                <div class="header-actions">
                    <a href="{{ route('laporan.peminjaman') }}" target="_blank" class="btn-custom btn-success-custom">
                        <i class="fas fa-file-pdf"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-list-ul me-2"></i>Daftar Peminjaman Buku</h5>
                </div>

                <div class="table-controls">
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="Cari berdasarkan nomor peminjaman, nama peminjam, atau judul buku...">
                        <button class="search-btn" id="searchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="filter-box">
                        <select class="filter-select" id="statusFilter">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="aktif">Aktif</option>
                            <option value="ditolak">Ditolak</option>
                            <option value="dikembalikan">Dikembalikan</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="stats-info">
                        <div class="stat-item">
                            <i class="fas fa-book-open"></i>
                            <span>Total: <strong class="stat-number">{{ $peminjamans->count() }}</strong> Peminjaman</span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="60">No</th>
                                    <th>Nomor Peminjaman</th>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th width="120">Status</th>
                                    <th width="180">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="loansTableBody">
                                @forelse ($peminjamans as $item)
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <div class="loan-number">{{ $item->nomor_peminjaman }}</div>
                                        <div class="loan-date">{{ $item->tanggal_peminjaman ? $item->tanggal_peminjaman->format('d M Y') : 'N/A' }}</div>
                                    </td>
                                    <td>
                                        <div class="user-info">
                                            <h6>{{ $item->user->name }}</h6>
                                            <p>{{ $item->user->username }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="book-info">
                                            <h6>{{ $item->book->title }}</h6>
                                            <p>{{ $item->book->author }}</p>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 'pending')
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                Pending
                                            </span>
                                        @elseif($item->status == 'aktif')
                                            <span class="status-badge status-aktif">
                                                <i class="fas fa-check-circle"></i>
                                                Aktif
                                            </span>
                                        @elseif($item->status == 'ditolak')
                                            <span class="status-badge status-ditolak">
                                                <i class="fas fa-times-circle"></i>
                                                Ditolak
                                            </span>
                                        @elseif($item->status == 'dikembalikan')
                                            <span class="status-badge status-dikembalikan">
                                                <i class="fas fa-undo"></i>
                                                Dikembalikan
                                            </span>
                                        @elseif($item->status == 'selesai')
                                            <span class="status-badge status-selesai">
                                                <i class="fas fa-check-double"></i>
                                                Selesai
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            @if ($item->status == 'pending')
                                                <form action="{{ route('admin.peminjaman.approve', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn-action btn-approve" onclick="return confirm('Apakah Anda yakin ingin menyetujui peminjaman ini?')">
                                                        <i class="fas fa-check"></i>
                                                        Setujui
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.peminjaman.reject', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn-action btn-reject" onclick="return confirm('Apakah Anda yakin ingin menolak peminjaman ini?')">
                                                        <i class="fas fa-times"></i>
                                                        Tolak
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted small">Tidak ada aksi</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-book-open"></i>
                                            <h5>Belum ada data peminjaman</h5>
                                            <p>Saat ini belum ada permintaan peminjaman buku yang tercatat dalam sistem.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search and filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchBtn = document.getElementById('searchBtn');
            const statusFilter = document.getElementById('statusFilter');
            const tableBody = document.getElementById('loansTableBody');
            const originalRows = Array.from(tableBody.querySelectorAll('tr'));

            function performFilter() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const statusValue = statusFilter.value.toLowerCase();
                let visibleCount = 0;

                originalRows.forEach(row => {
                    if (row.querySelector('.empty-state')) return;

                    const loanNumber = row.querySelector('.loan-number')?.textContent.toLowerCase() || '';
                    const userName = row.querySelector('.user-info h6')?.textContent.toLowerCase() || '';
                    const bookTitle = row.querySelector('.book-info h6')?.textContent.toLowerCase() || '';
                    const statusBadge = row.querySelector('.status-badge')?.textContent.toLowerCase() || '';

                    const matchesSearch = !searchTerm ||
                                         loanNumber.includes(searchTerm) ||
                                         userName.includes(searchTerm) ||
                                         bookTitle.includes(searchTerm);

                    const matchesStatus = !statusValue || statusBadge.includes(statusValue);

                    const shouldShow = matchesSearch && matchesStatus;
                    row.style.display = shouldShow ? '' : 'none';
                    if (shouldShow) visibleCount++;
                });

                // Update stats
                const statNumber = document.querySelector('.stat-number');
                if (statNumber) {
                    statNumber.textContent = visibleCount;
                }
            }

            // Search on input
            searchInput.addEventListener('input', performFilter);

            // Search on button click
            searchBtn.addEventListener('click', performFilter);

            // Filter on status change
            statusFilter.addEventListener('change', performFilter);

            // Search on Enter key
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    performFilter();
                }
            });
        });
    </script>

</body>

</html>
