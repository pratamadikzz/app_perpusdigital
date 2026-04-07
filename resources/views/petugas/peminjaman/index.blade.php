<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Petugas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #eff4ff;
            color: #0f172a;
            font-family: Inter, system-ui, sans-serif;
        }

        .main-content {
            flex: 1;
            min-height: 100vh;
            margin-left: 250px;
        }

        .content-wrapper {
            padding: 32px;
        }

        .page-heading {
            margin-bottom: 1.5rem;
        }

        .page-heading h3 {
            font-weight: 700;
        }

        .card {
            border-radius: 20px;
            border: 1px solid rgba(148, 163, 184, 0.2);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.06);
        }

        .card-body {
            padding: 1.75rem;
        }

        .table thead th {
            background-color: #1e293b;
            color: #fff;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .badge-status {
            border-radius: 999px;
            font-size: 0.8rem;
            padding: 0.45rem 0.75rem;
            font-weight: 700;
        }

        .status-pending {
            background: #facc15;
            color: #1e293b;
        }

        .status-aktif {
            background: #22c55e;
            color: #0f172a;
        }

        .status-menunggu {
            background: #38bdf8;
            color: #0f172a;
        }

        .status-dikembalikan {
            background: #64748b;
            color: #ffffff;
        }

        .status-ditolak {
            background: #ef4444;
            color: #ffffff;
        }

        .btn-action {
            min-width: 120px;
        }
    </style>
</head>

<body>

    {{-- Sidebar --}}
    @include('petugas.dataBuku.components.sidebar')

    <div class="main-content">

        {{-- Navbar --}}
        @include('petugas.dataBuku.components.nav')

        <div class="content-wrapper">

            <h3 class="mb-4">Data Peminjaman Buku</h3>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <a href="{{ route('laporan.peminjaman') }}" target="_blank" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-file-pdf"></i> Cetak Laporan PDF
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nomor</th>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th>Status</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjamans as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomor_peminjaman }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->buku->title }}</td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="badge badge-status status-pending">Pending</span>
                                            @elseif($item->status == 'aktif')
                                                <span class="badge badge-status status-aktif">Sedang Dipinjam</span>
                                            @elseif($item->status == 'menunggu')
                                                <span class="badge badge-status status-menunggu">Menunggu Persetujuan</span>
                                            @elseif($item->status == 'dikembalikan')
                                                <span class="badge badge-status status-dikembalikan">Sudah Dikembalikan</span>
                                            @elseif($item->status == 'ditolak')
                                                <span class="badge badge-status status-ditolak">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <div class="d-flex justify-content-center gap-2">
                                                    <form action="{{ route('petugas.peminjaman.approve', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm btn-action">
                                                            Approve
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('petugas.peminjaman.reject', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm btn-action">
                                                            Tolak
                                                        </button>
                                                    </form>
                                                </div>
                                            @elseif($item->status == 'aktif')
                                                <span class="badge bg-light text-dark">Dipinjam</span>
                                            @elseif($item->status == 'menunggu')
                                                <span class="badge bg-light text-dark">Menunggu</span>
                                            @elseif($item->status == 'dikembalikan')
                                                <span class="text-success fw-bold">✓ Selesai</span>
                                            @elseif($item->status == 'ditolak')
                                                <span class="text-danger fw-bold">✗ Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            Tidak ada data peminjaman
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
