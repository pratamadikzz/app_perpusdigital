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
            background-color: #f4f6f9;
        }

        .layout-wrapper {
            display: flex;
        }

        .main-content {
            flex: 1;
            min-height: 100vh;
            margin-left: 250px;
            /* penting kalau sidebar pakai fixed */
        }

        .content-wrapper {
            padding: 30px;
        }

        .card {
            border-radius: 12px;
        }

        .table th {
            background-color: #212529;
            color: white;
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
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif($item->status == 'aktif')
                                                <span class="badge bg-success">Sedang Dipinjam</span>
                                            @elseif($item->status == 'menunggu')
                                                <span class="badge bg-info">Menunggu Persetujuan Pengembalian</span>
                                            @elseif($item->status == 'dikembalikan')
                                                <span class="badge bg-secondary">Sudah Dikembalikan</span>
                                            @elseif($item->status == 'ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <div class="d-flex justify-content-center gap-2">
                                                    <form action="{{ route('petugas.peminjaman.approve', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm">
                                                            Approve
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('petugas.peminjaman.reject', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">
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
