<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $book->title }} - PustakaDigital</title>

    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #1b2741;
            --secondary: #4a90e2;
            --accent: #f67034;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --border: #e9ecef;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
            --radius: 12px;
            --radius-sm: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .book-detail {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin: 30px 0;
        }

        .book-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 40px 30px;
        }

        .book-cover {
            width: 280px;
            height: 400px;
            object-fit: cover;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            margin-bottom: 20px;
        }

        .book-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .book-author {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 20px;
        }

        .rating-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .book-rating {
            background: var(--accent);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stock-badge {
            background: var(--success);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 500;
            border: none;
        }

        .wishlist-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .wishlist-btn:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-2px);
        }

        .book-content {
            padding: 40px 30px;
        }

        .book-description {
            background: var(--light);
            padding: 30px;
            border-radius: var(--radius);
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary);
        }

        .book-description h4 {
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .book-description p {
            color: var(--gray);
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .detail-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow);
        }

        .detail-card h5 {
            color: var(--primary);
            font-size: 1.3rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-item span {
            color: var(--gray);
            font-weight: 500;
        }

        .detail-item strong {
            color: var(--dark);
            font-weight: 600;
        }

        .reviews-section {
            background: white;
            border-radius: var(--radius);
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .reviews-section h4 {
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .review {
            background: var(--light);
            border-radius: var(--radius-sm);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid var(--accent);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .review-author {
            font-weight: 600;
            color: var(--primary);
        }

        .review-date {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .review-rating {
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .review-text {
            color: var(--dark);
            line-height: 1.6;
        }

        .borrow-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 2px solid var(--border);
            padding: 20px;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .borrow-btn {
            background: linear-gradient(135deg, var(--success) 0%, #20c997 100%);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .borrow-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        @media (max-width: 768px) {
            .book-header {
                padding: 30px 20px;
                text-align: center;
            }

            .book-title {
                font-size: 2rem;
            }

            .book-cover {
                width: 200px;
                height: 300px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .book-content {
                padding: 30px 20px;
            }

            .borrow-bar {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <div class="container">
        <div class="book-detail">
            <!-- Book Header -->
            <div class="book-header">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-center">
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="book-cover">

                        <div class="rating-section">
                            <div class="book-rating">
                                <i class="fas fa-star"></i>
                                {{ number_format($rating, 1) }}
                            </div>
                            <span class="stock-badge">
                                <i class="fas fa-check-circle"></i>
                                Stok: {{ $book->stock }} buku
                            </span>
                        </div>

                        <form action="{{ route('favorit.toggle', $book->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                                {{ auth()->user() && auth()->user()->favorites->contains($book->id) ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-8">
                        <h1 class="book-title">{{ $book->title }}</h1>
                        <p class="book-author">
                            <i class="fas fa-user"></i>
                            oleh {{ $book->author }}
                        </p>

                        <div class="book-description">
                            <h4><i class="fas fa-book-open"></i> Deskripsi</h4>
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Book Details -->
            <div class="book-content">
                <div class="detail-grid">
                    <div class="detail-card">
                        <h5><i class="fas fa-info-circle"></i> Informasi Publikasi</h5>
                        <div class="detail-item">
                            <span>Penerbit</span>
                            <strong>{{ $book->publisher ?? 'Tidak tersedia' }}</strong>
                        </div>
                        <div class="detail-item">
                            <span>Tahun Terbit</span>
                            <strong>{{ $book->publication_year ?? 'Tidak tersedia' }}</strong>
                        </div>
                        <div class="detail-item">
                            <span>ISBN</span>
                            <strong>{{ $book->isbn ?? 'Tidak tersedia' }}</strong>
                        </div>
                        <div class="detail-item">
                            <span>Bahasa</span>
                            <strong>{{ $book->languange ?? 'Tidak tersedia' }}</strong>
                        </div>
                    </div>

                    <div class="detail-card">
                        <h5><i class="fas fa-ruler-combined"></i> Spesifikasi Fisik</h5>
                        <div class="detail-item">
                            <span>Jumlah Halaman</span>
                            <strong>{{ $book->number_of_books ?? 'Tidak tersedia' }}</strong>
                        </div>
                        <div class="detail-item">
                            <span>Panjang (cm)</span>
                            <strong>{{ $book->book_length ?? 'Tidak tersedia' }}</strong>
                        </div>
                        <div class="detail-item">
                            <span>Lebar (cm)</span>
                            <strong>{{ $book->book_width ?? 'Tidak tersedia' }}</strong>
                        </div>
                        <div class="detail-item">
                            <span>Berat (gram)</span>
                            <strong>{{ $book->book_weight ?? 'Tidak tersedia' }}</strong>
                        </div>
                    </div>
                </div>


                <!-- Reviews Section -->
                <div class="reviews-section">
                    <h4><i class="fas fa-comments"></i> Ulasan Pembaca</h4>

                    @forelse($book->reviews as $review)
                        <div class="review">
                            <div class="review-header">
                                <span class="review-author">{{ $review->user->name }}</span>
                                <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star"></i> {{ $review->rating }}/5
                            </div>
                            <p class="review-text">{{ $review->ulasan }}</p>
                        </div>
                    @empty
                        <div class="review">
                            <p class="review-text" style="text-align: center; color: var(--gray); font-style: italic;">
                                <i class="fas fa-comment-slash"></i> Belum ada ulasan untuk buku ini.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


    </div>

    <!-- Borrow Bar -->
    <div class="borrow-bar">
        <a href="{{ route('buku.Formpinjam', $book->id) }}" class="borrow-btn">
            <i class="fas fa-book"></i> Pinjam Buku Sekarang
        </a>
    </div>

    <script>
        // Add smooth scroll for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

        <script src="{{ asset('js/script1.js') }}"></script>

</body>

</html>
