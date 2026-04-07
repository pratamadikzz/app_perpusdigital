<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk - Petugas | PustakaDigital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; font-family: 'Inter', sans-serif; }
        .main { margin-left: 270px; }
        .content { padding: 30px; min-height: 100vh; }
        .page-header { background: white; padding: 24px 30px; border-radius: 16px; box-shadow: 0 10px 25px rgba(15,23,42,.08); margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; }
        .page-header h2 { margin:0; font-size: 28px; color: #1e293b; }
        .card { border-radius: 16px; border: none; box-shadow: 0 20px 40px rgba(15,23,42,.06); }
        .table thead th { background: #1e40af; color: #fff; border:none; }
        .table tbody tr:hover { background: #f1f5ff; }
        .badge-status { padding: 6px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; }
        .badge-read { background: #22c55e; color: #fff; }
        .badge-unread { background: #f59e0b; color: #fff; }
    </style>
</head>

<body>
    @include('petugas.dataBuku.components.sidebar')
    <div class="main">
    @include('petugas.dataBuku.components.nav')

    
        <div class="content">
            <div class="page-header">
                <div>
                    <h2><i class="fas fa-envelope text-primary me-2"></i>Pesan Masuk</h2>
                    <p class="text-muted mb-0">Pesan yang ditujukan ke petugas perpustakaan.</p>
                </div>
                <span class="badge bg-primary py-2 px-3">{{ $messages->count() }} Pesan</span>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th width="120">Status</th>
                                    <th width="180">Dikirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->message, 80) }}</td>
                                        <td>
                                            <span class="badge-status {{ $message->is_read ? 'badge-read' : 'badge-unread' }}">
                                                {{ $message->is_read ? 'Terbaca' : 'Baru' }}
                                            </span>
                                        </td>
                                        <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">Belum ada pesan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
