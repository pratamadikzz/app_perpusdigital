<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    @include('petugas.dataBuku.components.sidebar')
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content">
            <div class="container-fluid py-4">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-0">Data Buku</h4>
                        <small class="text-muted">Semua perubahan harus disetujui admin</small>
                    </div>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        + Tambah Buku
                    </button>
                </div>

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
