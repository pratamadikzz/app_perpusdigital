<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin | Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')


    <div class="main-content container-fluid py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="fw-semibold mb-0">Manajemen Data Buku</h4>
                <small class="text-muted">Kelola koleksi buku perpustakaan</small>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('laporan.buku') }}" target="_blank" class="btn btn-success">
                    <i class="fa-solid fa-file-pdf"></i> Cetak Laporan PDF
                </a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    + Tambah Buku
                </button>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <select id="filterKategori" class="form-select mb-3">
                    <option value="">Semua Kategori</option>
                    @foreach ($books->unique('category') as $b)
                        <option value="{{ $b->category }}">
                            {{ $b->category }}
                        </option>
                    @endforeach
                </select>

                <div class="table-responsive">
                    <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control"
                            placeholder="Cari judul atau penulis...">
                    </div>

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

                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $book->id }}">
                                                Edit
                                            </button>

                                            <form action="{{ url('admin/dataBuku/' . $book->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus buku ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                @include('admin.dataBuku.modal_edit')
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </div>

        @include('admin/dataBuku/modal_create')

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        function sortTable(col) {
            let table = document.querySelector("table tbody");
            let rows = Array.from(table.rows);

            rows.sort((a, b) =>
                a.cells[col].innerText
                .localeCompare(b.cells[col].innerText)
            );

            rows.forEach(row => table.appendChild(row));
        }
    </script> --}}

    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                row.style.display =
                    row.innerText.toLowerCase().includes(value) ?
                    "" :
                    "none";
            });
        });
    </script>

    <script>
        document.getElementById("filterKategori").addEventListener("change", function() {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                row.style.display =
                    value === "" || row.innerText.toLowerCase().includes(value) ?
                    "" :
                    "none";
            });
        });
    </script>




</body>

</html>
