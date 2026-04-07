<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Kategori - Petugas</title>
    <style>
        body {
            background: #eef2ff;
            color: #1e293b;
            font-family: Inter, system-ui, sans-serif;
        }

        .main {
            min-height: 100vh;
        }

        .content {
            padding: 32px;
        }

        .page-heading {
            margin-bottom: 1.5rem;
        }

        .card {
            border-radius: 18px;
            border: 1px solid rgba(148, 163, 184, 0.2);
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.05);
        }

        .table thead th {
            background: #312e81;
            color: #fff;
            border: none;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .btn-primary {
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.18);
        }

        .modal-content {
            border-radius: 20px;
        }

        .empty-state {
            padding: 2rem;
            text-align: center;
            color: #475569;
        }
    </style>
</head>

<body>
    @include('petugas.dataBuku.components.sidebar')
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content">
            <div class="container-fluid py-4">

                <!-- Header -->
                <div class="page-heading d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div>
                        <h4 class="fw-bold mb-1">Data Kategori</h4>
                        <p class="text-muted mb-0">Kelola kategori buku agar pencarian menjadi lebih mudah.</p>
                    </div>

                    <button class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Kategori
                    </button>
                </div>

                <!-- Card Table -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($kategori as $index => $kat)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $kat->NamaKategori }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="empty-state">
                                                Tidak ada kategori tersedia.
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
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
