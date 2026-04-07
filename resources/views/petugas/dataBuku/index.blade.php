<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Buku - Petugas</title>
    <style>
        body {
            background: #f4f7fb;
            color: #1f2937;
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

        .summary-cards {
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .summary-card {
            background: #ffffff;
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 18px;
            padding: 1rem 1.25rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        }

        .summary-card h5 {
            margin: 0;
            font-size: 0.95rem;
            color: #64748b;
            font-weight: 600;
        }

        .summary-card .value {
            font-size: 2rem;
            font-weight: 700;
            color: #0f172a;
            margin-top: 0.5rem;
        }

        .card {
            border-radius: 20px;
        }

        .table thead th {
            background: #0f172a;
            color: #fff;
            border: none;
        }

        .table tbody tr {
            background: #fff;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .badge-status {
            border-radius: 999px;
            font-size: 0.75rem;
            padding: 0.45rem 0.7rem;
            font-weight: 700;
        }

        .table-responsive {
            overflow: hidden;
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
                        <h4 class="fw-bold mb-1">Data Buku</h4>
                        <p class="text-muted mb-0">Kelola koleksi buku dan ajukan perubahan ke admin.</p>
                    </div>

                    <button class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Buku
                    </button>
                </div>

                <div class="d-flex flex-column flex-lg-row summary-cards">
                    <div class="summary-card col">
                        <h5>Total Buku</h5>
                        <div class="value">{{ $books->count() }}</div>
                    </div>
                    <div class="summary-card col">
                        <h5>Request Pending</h5>
                        <div class="value">{{ isset($bookRequests) ? $bookRequests->count() : 0 }}</div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(isset($bookRequests) && $bookRequests->count())
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-warning text-dark">
                            <strong>Permintaan Buku Pending</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Tahun Terbit</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookRequests as $request)
                                            <tr>
                                                <td>
                                                    @if($request->cover)
                                                        <img src="{{ asset('storage/' . $request->cover) }}" width="50" class="rounded shadow-sm">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="fw-semibold">{{ $request->title }}</td>
                                                <td>{{ $request->author }}</td>
                                                <td>{{ $request->publisher }}</td>
                                                <td>{{ $request->category }}</td>
                                                <td>{{ $request->stock }}</td>
                                                <td>{{ $request->publication_year }}</td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Card Table -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>ISBN</th>
                                        <th>Bahasa</th>
                                        <th>Panjang Buku</th>
                                        <th>Berat Buku</th>
                                        <th>Lebar Buku</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Tahun Terbit</th>
                                        <th width="250">Deskripsi</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $book->cover) }}" width="50"
                                                    class="rounded shadow-sm">
                                            </td>

                                            <td class="fw-semibold">{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->category }}</td>

                                            <td>
                                                {{ $book->stock }}
                                            </td>

                                            <td>
                                                {{ $book->isbn }}
                                            </td>

                                            <td>
                                                {{ $book->languange }}
                                            </td>

                                            <td>
                                                {{ $book->book_length }}
                                            </td>

                                            <td>
                                                {{ $book->book_weight }}
                                            </td>

                                            <td>
                                                {{ $book->book_width }}
                                            </td>

                                            <td>
                                                {{ $book->number_of_books }}
                                            </td>

                                            <td>{{ $book->publication_year }}</td>

                                            <td>
                                                {{ Str::limit($book->description, 80) }}
                                            </td>

                                            <td>
                                                <div class="d-flex gap-2">

                                                    <!-- Edit -->
                                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $book->id }}">
                                                        Edit
                                                    </button>

                                                    <!-- Delete -->
                                                    <form method="POST"
                                                        action="/petugas/dataBuku/delete/{{ $book->id }}">
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger">
                                                            Ajukan Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>

                                        {{-- Modal Edit --}}
                                        @include('petugas.dataBuku.modal_edit')
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            </div>

            @include('petugas.dataBuku.modal_create')


        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            //sidebar
            const hamburger = document.getElementById("hamburger");
            const sidebar = document.querySelector(".sidebar");
            const main = document.querySelector(".main");

            hamburger.onclick = function() {
                sidebar.classList.toggle("hide");
                main.classList.toggle("full");
            };

            //dropdown btn
            document.querySelector(".dropdown-btn").onclick = function() {
                this.parentElement.classList.toggle("active");
            };

            //navbar
            document.querySelectorAll(".nav-trigger").forEach((trigger) => {
                trigger.addEventListener("click", function() {
                    this.parentElement.classList.toggle("active");
                });
            });
        </script>
</body>

</html>
