<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Buku - Admin | PustakaDigital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .page-content {
            flex: 1;
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

        .header-stats {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .stat-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stat-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
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

        /* Book Cover */
        .book-cover {
            width: 60px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .no-cover {
            width: 60px;
            height: 80px;
            border-radius: 8px;
            background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-size: 20px;
        }

        /* Action Badges */
        .action-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .action-create {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .action-update {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .action-delete {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        /* Book Details */
        .book-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .book-description {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-meta {
            font-size: 11px;
            color: #64748b;
            line-height: 1.4;
        }

        .book-meta strong {
            color: #475569;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-create {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .status-update {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .status-delete {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
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

            .header-stats {
                width: 100%;
                justify-content: center;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .book-meta {
                font-size: 10px;
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
                <h2><i class="fas fa-clipboard-check text-primary me-3"></i>Persetujuan Buku</h2>
                <div class="header-stats">
                    <span class="stat-badge stat-warning">
                        <i class="fas fa-clock"></i>
                        {{ $requests->count() }} Request Pending
                    </span>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-list-check me-2"></i>Daftar Permintaan Persetujuan Buku</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="80">Cover</th>
                                    <th width="100">Aksi</th>
                                    <th>Detail Buku</th>
                                    <th width="120">Status</th>
                                    <th width="180">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $r)
                                <tr>
                                    <td class="text-center">
                                        @if ($r->cover)
                                            <img src="{{ asset('storage/' . $r->cover) }}" alt="Cover Buku" class="book-cover">
                                        @else
                                            <div class="no-cover">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($r->action == 'create')
                                            <span class="action-badge action-create">CREATE</span>
                                        @elseif($r->action == 'update')
                                            <span class="action-badge action-update">UPDATE</span>
                                        @else
                                            <span class="action-badge action-delete">DELETE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="book-title">{{ $r->title ?? 'Judul tidak tersedia' }}</div>
                                        <div class="book-description">
                                            <strong>Deskripsi:</strong> {{ $r->description ?? 'Tidak ada deskripsi' }}
                                        </div>
                                        <div class="book-meta">
                                            <div><strong>Penulis:</strong> {{ $r->author ?? '-' }}</div>
                                            <div><strong>Penerbit:</strong> {{ $r->publisher ?? '-' }}</div>
                                            <div><strong>Kategori:</strong> {{ $r->kategori->nama_kategori ?? '-' }}</div>
                                            <div><strong>Stok:</strong> {{ $r->stock ?? '-' }} | <strong>Tahun:</strong> {{ $r->publication_year ?? '-' }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($r->action == 'create')
                                            <span class="status-badge status-create">Tambah Buku</span>
                                        @elseif($r->action == 'update')
                                            <span class="status-badge status-update">Edit Buku</span>
                                        @else
                                            <span class="status-badge status-delete">Hapus Buku</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <form method="POST" action="/admin/book-requests/approve/{{ $r->id }}" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn-action btn-approve" onclick="return confirm('Apakah Anda yakin ingin menyetujui permintaan ini?')">
                                                    <i class="fas fa-check"></i>
                                                    Setujui
                                                </button>
                                            </form>
                                            <form method="POST" action="/admin/book-requests/reject/{{ $r->id }}" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn-action btn-reject" onclick="return confirm('Apakah Anda yakin ingin menolak permintaan ini?')">
                                                    <i class="fas fa-times"></i>
                                                    Tolak
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            <i class="fas fa-clipboard-check"></i>
                                            <h5>Tidak ada permintaan pending</h5>
                                            <p>Semua permintaan buku telah diproses atau belum ada permintaan baru.</p>
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

</body>

</html>
