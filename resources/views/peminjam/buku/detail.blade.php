<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLz\eN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <title>Document</title>
</head>

<body>
    @include('partials.navbar')

    <div class="container mt-4 mb-5">
        <div class="book-detail">

            <div class="row">
                <!-- Cover -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/educated.png') }}" class="img-fluid book-cover mb-3">

                    <!-- Rating -->
                    <div class="mb-2">
                        ⭐⭐⭐⭐☆ <span class="text-muted">(4.2)</span>
                    </div>

                    <!-- Wishlist -->
                    <button class="btn btn-outline-danger btn-sm">
                        ❤ Tambah ke Favorit
                    </button>
                </div>

                <!-- Info Buku -->
                <div class="col-md-8 content-right">

                    <h2 class="book-title mb-1">
                        Cara Melawan Rasa Malas
                    </h2>

                    <p class="book-author mb-3">
                        oleh John Doe
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-success stock-badge">
                            ✔ Stok tersedia: 12 buku
                        </span>
                    </div>

                    <p class="mt-3">
                        Buku ini membantu pembaca memahami cara mengatasi rasa malas,
                        meningkatkan produktivitas, serta membangun kebiasaan positif
                        melalui metode yang mudah diterapkan.
                    </p>

                </div>
            </div>

            <!-- Deskripsi -->
            <div class="detail-section">
                <h4 class="fw-bold">Deskripsi</h4>
                <p class="text-muted">
                    Buku ini memberikan panduan praktis untuk meningkatkan
                    produktivitas dan membangun kebiasaan positif sehari-hari.
                </p>
            </div>

            <!-- Detail Buku -->
            <div class="detail-section">
                 <h4 class="fw-bold">Detail</h4>
                <div class="row detail-book">
                    <div class="col-md-6">
                        <div class="detail-item">
                            <span>Penerbit</span>
                            <strong>Penerbit Contoh</strong>
                        </div>

                        <div class="detail-item">
                            <span>ISBN</span>
                            <strong>978xxxxxxx</strong>
                        </div>

                        <div class="detail-item">
                            <span>Bahasa</span>
                            <strong>Indonesia</strong>
                        </div>

                        <div class="detail-item">
                            <span>Panjang Buku</span>
                            <strong>30 cm</strong>
                        </div>

                    </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <span>Tanggal Terbit</span>
                                <strong>2026</strong>
                            </div>

                            <div class="detail-item">
                                <span>Jumlah Halaman</span>
                                <strong>300 halaman</strong>
                            </div>

                            <div class="detail-item">
                                <span>Berat Buku</span>
                                <strong>500 gram</strong>
                            </div>

                            <div class="detail-item">
                                <span>Lebar Buku</span>
                                <strong>21 cm</strong>
                            </div>
                        </div>
                    </div>
                </div>


                <h4 class="fw-bold mb-3">Ulasan Pembaca</h4>

                <!-- Review Item -->
                <div class="review">
                    <div class="d-flex justify-content-between">
                        <b>Andi</b>
                        <small class="text-muted">2 hari lalu</small>
                    </div>

                    <div class="mb-2">
                        ⭐⭐⭐⭐⭐
                    </div>

                    <p class="mb-0 text-muted">
                        Buku ini sangat membantu meningkatkan disiplin belajar.
                    </p>
                </div>

                <!-- Review Item -->
                <div class="review">
                    <div class="d-flex justify-content-between">
                        <b>Sinta</b>
                        <small class="text-muted">1 minggu lalu</small>
                    </div>

                    <div class="mb-2">
                        ⭐⭐⭐⭐☆
                    </div>

                    <p class="mb-0 text-muted">
                        Mudah dipahami dan sangat aplikatif.
                    </p>
                </div>

            </div>

        </div>


    </div>

    <div class="borrow-bar">
        <button class="btn btn-primary btn-lg w-100">
            Pinjam Buku
        </button>
    </div>


    <script src="{{ asset('js/script1.js') }}"></script>
</body>

</html>
