<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjam - Admin | PustakaDigital</title>

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

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
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

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-delete {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
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

            .stats-info {
                justify-content: center;
                flex-wrap: wrap;
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
                <h2><i class="fas fa-users text-primary me-3"></i>Data Peminjam</h2>
                <div class="header-actions">
                    <a href="{{ route('laporan.peminjam') }}" target="_blank" class="btn-custom btn-success-custom">
                        <i class="fas fa-file-pdf"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-list-ul me-2"></i>Daftar Peminjam Sistem</h5>
                </div>

                <div class="table-controls">
                    <form method="GET" action="{{ route('admin.dataPengguna.peminjam.index') }}" class="search-box">
                        <input type="text" name="search" placeholder="Cari berdasarkan nama, username, atau email..." value="{{ request('search') }}">
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="stats-info">
                        <div class="stat-item">
                            <i class="fas fa-users"></i>
                            <span>Total: <strong class="stat-number">{{ $users->count() }}</strong> Peminjam</span>
                        </div>
                        @if(request('search'))
                        <div class="stat-item">
                            <a href="{{ route('admin/dataPengguna/peminjam/index') }}" class="text-muted" style="text-decoration: none;">
                                <i class="fas fa-times"></i> Hapus Filter
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="60">No</th>
                                    <th>Peminjam</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar me-3">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div class="user-info">
                                                <h6>{{ $user->name }}</h6>
                                                <p>Terdaftar {{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $user->username }}</span>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->alamat ?? 'Alamat belum diisi' }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <form action="{{ url('admin/peminjam/delete/'.$user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peminjam ini?')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete" title="Hapus Peminjam">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-users"></i>
                                            <h5>Belum ada data peminjam</h5>
                                            <p>Saat ini belum ada peminjam yang terdaftar di sistem perpustakaan.</p>
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
        // Auto-submit search on Enter key
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    this.closest('form').submit();
                }
            });
        });
    </script>

</body>

</html>
