<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    @include('components.sidebar')
    @include('components.navbar')

    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Persetujuan Data Buku</h4>
                <small class="text-muted">Daftar pengajuan dari petugas</small>
            </div>

            <div>
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                    {{ $requests->count() }} Request Pending
                </span>
            </div>
        </div>


        <!-- Card -->
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead class="table-light text-center">
                            <tr>
                                <th>Cover</th>
                                <th>Action</th>
                                <th>Detail Buku</th>
                                <th>Status</th>
                                <th width="200">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($requests as $r)
                                <tr>

                                    <!-- Cover -->
                                    <td width="90" class="text-center">
                                        @if ($r->cover)
                                            <img src="{{ asset('storage/' . $r->cover) }}" width="60"
                                                class="rounded shadow-sm">
                                        @else
                                            <span class="text-muted small">No Image</span>
                                        @endif
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        @if ($r->action == 'create')
                                            <span class="badge bg-success">CREATE</span>
                                        @elseif($r->action == 'update')
                                            <span class="badge bg-warning text-dark">UPDATE</span>
                                        @else
                                            <span class="badge bg-danger">DELETE</span>
                                        @endif
                                    </td>

                                    <!-- Detail -->
                                    <td>
                                        <div class="fw-semibold fs-6">{{ $r->title ?? '-' }}</div>

                                        <small class="text-muted d-block mt-1">
                                            <strong>Deskripsi Pengajuan:</strong>
                                            {{ $r->description ?? '-' }}
                                        </small>

                                        <hr class="my-2">

                                        <small class="text-muted d-block">
                                            Penulis: {{ $r->author ?? '-' }}
                                        </small>
                                        <small class="text-muted d-block">
                                            Penerbit: {{ $r->publisher ?? '-' }}
                                        </small>
                                        <small class="text-muted d-block">
                                            Kategori: {{ $r->kategori->nama_kategori ?? '-' }}
                                        </small>
                                        <small class="text-muted d-block">
                                            Stok: {{ $r->stock ?? '-' }} |
                                            Tahun: {{ $r->publication_year ?? '-' }}
                                        </small>
                                    </td>


                                    <!-- Status -->
                                    <td class="text-center">
                                        @if ($r->action == 'create')
                                            <span class="badge bg-success">Tambah Buku</span>
                                        @elseif($r->action == 'update')
                                            <span class="badge bg-primary">Edit Buku</span>
                                        @else
                                            <span class="badge bg-danger">Hapus Buku</span>
                                        @endif
                                    </td>


                                    <!-- Aksi -->
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">

                                            <form method="POST"
                                                action="/admin/book-requests/approve/{{ $r->id }}">
                                                @csrf
                                                <button class="btn btn-sm btn-success">
                                                    ✓ Approve
                                                </button>
                                            </form>

                                            <form method="POST"
                                                action="/admin/book-requests/reject/{{ $r->id }}">
                                                @csrf
                                                <button class="btn btn-sm btn-danger">
                                                    ✕ Reject
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Tidak ada request pending
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
