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
                    <img src="{{ asset('storage/' . $book->cover ) }}" class="img-fluid book-cover mb-3">

                    <!-- Rating -->
                    <div class="mb-2">
                        <div class="book-rating">★★★★☆ <span>(4.1)</span></div>
                    </div>

                    <!-- Wishlist -->
                    <button class="btn btn-outline-danger btn-sm">
                        ❤ Tambah ke Favorit
                    </button>
                </div>
                
                <!-- Info Buku -->
                <div class="col-md-8 content-right">

                    <h2 class="book-title mb-1">
                        {{ $book->title }}
                    </h2>

                    <p class="book-author mb-3">
                        oleh {{ $book->author }}
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-success stock-badge">
                            ✔ Stok tersedia: {{ $book->stock }} buku
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
                    {{$book->description}}
                </p>
            </div>

            <!-- Detail Buku -->
            <div class="detail-section">
                 <h4 class="fw-bold">Detail</h4>
                <div class="row detail-book">
                    <div class="col-md-6">
                        <div class="detail-item">
                            <span>Penerbit</span>
                            <strong>{{ $book->publisher }}</strong>
                        </div>

                        <div class="detail-item">
                            <span>ISBN</span>
                            <strong>{{ $book->isbn }}</strong>
                        </div>

                        <div class="detail-item">
                            <span>Bahasa</span>
                            <strong>{{ $book->languange }}</strong>
                        </div>

                        <div class="detail-item">
                            <span>Panjang Buku (cm)</span>
                            <strong>{{ $book->book_length }}</strong>
                        </div>

                    </div>

                        <div class="col-md-6">
                            <div class="detail-item">
                                <span>Tanggal Terbit</span>
                                <strong>{{ $book->publication_year }}</strong>
                            </div>

                            <div class="detail-item">
                                <span>Jumlah Halaman</span>
                                <strong>{{ $book->number_of_books }}</strong>
                            </div>

                            <div class="detail-item">
                                <span>Berat Buku (gram)</span>
                                <strong>{{ $book->book_weight }}</strong>
                            </div>

                            <div class="detail-item">
                                <span>Lebar Buku (cm)</span>
                                <strong>{{ $book->book_width }}</strong>
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
        <a href="{{ route('buku.Formpinjam', $book->id) }}" class="btn btn-primary btn-lg w-100">
            Pinjam Buku
        </a>
    </div>



    <script src="{{ asset('js/script1.js') }}"></script>
</body>

</html>
