<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PustakaDigital</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>

    </style>

</head>

<body>
    {{-- navbar --}}
    @include('partials.navbar')

    <!-- BANNER -->
    <div class="banner">
        <h1>Selamat Datang Di Perpustakaan Digital</h1>
        <p>Bacalah Buku Sebanyak Banyaknya</p>
    </div>

    <!-- KATEGORI -->
    <div class="categories">
        <button class="category active" data-category="all">
            <i data-lucide="layers"></i>
            <span>Semua</span>
        </button>

        <button class="category" data-category="fiksi">
            <i data-lucide="book-text"></i>
            <span>Fiksi</span>
        </button>

        <button class="category" data-category="nonfiksi">
            <i data-lucide="library"></i>
            <span>Non Fiksi</span>
        </button>

        <button class="category" data-category="anak">
            <i data-lucide="baby"></i>
            <span>Anak</span>
        </button>

        <button class="category" data-category="teknologi">
            <i data-lucide="laptop"></i>
            <span>Teknologi</span>
        </button>
    </div>


    <!-- SECTION KATEGORI -->
    {{-- <div class="section">
        <h2>Jelajahi Berdasarkan Kategori</h2>

        <div class="category-books">

            <div class="category-card" data-category="teknologi">
                <img src="{{ asset('img/algoritma.jpeg') }}">
                <div class="overlay">
                    <h4>Teknologi</h4>
                    <a href="">Lihat Buku</a>
                </div>
            </div>

            <div class="category-card" data-category="pemrograman">
                <img src="{{ asset('img/pemrograman.jpeg') }}">
                <div class="overlay">
                    <h4>Pemrograman</h4>
                    <span>Lihat Buku</span>
                </div>
            </div>

            <div class="category-card" data-category="database">
                <img src="{{ asset('img/basis.jpeg') }}">
                <div class="overlay">
                    <h4>Basis Data</h4>
                    <span>Lihat Buku</span>
                </div>
            </div>

            <div class="category-card" data-category="design">
                <img src="{{ asset('img/ui.jpeg') }}">
                <div class="overlay">
                    <h4>UI/UX</h4>
                    <span>Lihat Buku</span>
                </div>
            </div>

            <div class="category-card" data-category="ai">
                <img src="{{ asset('img/ui.jpeg') }}">
                <div class="overlay">
                    <h4>Kecerdasan Buatan</h4>
                    <span>Lihat Buku</span>
                </div>
            </div>

        </div>
    </div> --}}


    {{-- <div class="books">

        <div class="book">
            <div class="book-top">
                <div class="lang">🌐 ID</div>
                <div class="favorite">♡</div>
            </div>

            <img src="{{ asset('img/educated.png') }}">

            <div class="book-author">Leila S. Chudori</div>
            <div class="book-title">Laut Bercerita</div>
        </div>

        <div class="book">
            <div class="book-top">
                <div class="lang">🌐 ID</div>
                <div class="favorite">♡</div>
            </div>

            <img src="{{ asset('img/richdad.jpg') }}">

            <div class="book-author">Robert T. Kiyosaki</div>
            <div class="book-title">Rich Dad Poor Dad</div>
        </div>

        <div class="book">
            <div class="book-top">
                <div class="lang">🌐 ID</div>
                <div class="favorite">♡</div>
            </div>

            <img src="{{ asset('img/mieayam.jpg') }}">

            <div class="book-author">Brian Khrisna</div>
            <div class="book-title">Seporsi Mie Ayam Sebelum Mati</div>
        </div>

    </div> --}}


    <style>
        :root {
            --bodyBack: #ffff;
            --textColor: #1b2741;
            --starColor: #f67034;
            --sectionBack: #f7f6f9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'inter', sans-serif;
        }

        body {
            background-color: var(--bodyBack);
            min-height: 100vh;
            display: grid;
            place-items: center;
        }

        .container {
            width: 100%;
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .header {
            width: 100%;
            text-align: center;
        }

        .header h1 {
            font-size: 4em;
            text-transform: uppercase;
            color: var(--textColor);
        }

        .books {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }

        .book {
            width: 220px;
            height: 400px;
            perspective: 1000px;
            position: relative;
            overflow: hidden;
        }

        .book-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .book:hover .book-inner {
            transform: rotateY(180deg);
        }

        .book-front,
        .book-back {
            position: absolute;
            width: 100%;
            height: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            backface-visibility: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
        }

        .book-back {
            padding: 15px;
            transform: rotateY(180deg);
            justify-content: center;
        }

        .book-back h3 {
            margin-bottom: 10px;
        }

        .book-back p {
            font-size: 14px;
            line-height: 1.5;
            color: #444;
        }

        .book:hover {
            transform: translateY(-6px);
        }

        .book-image {
            position: relative;
            height: 260px;
            overflow: hidden;
        }

        .book-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .wishlist {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: white;
            border-radius: 50%;
            padding: 6px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            z-index: 10;
        }

        .wishlist i {
            width: 18px;
            height: 18px;
        }

        .wishlist-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: white;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            z-index: 10;
            transition: all 0.3s ease;
        }

        .wishlist-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .wishlist-btn:active {
            transform: scale(0.95);
        }

        .heart-icon {
            width: 20px;
            height: 20px;
            color: gray;
            transition: all 0.3s ease;
        }

        .heart-icon.favorited {
            color: #e74c3c;
            fill: #e74c3c;
        }

        .heart-icon.clicked {
            animation: heartPulse 0.6s ease;
        }

        @keyframes heartPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.3);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #2ecc71;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            font-size: 14px;
            font-weight: 500;
            z-index: 1000;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast.error {
            background: #e74c3c;
        }

        .book-info {
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex-grow: 1;
        }

        .book-title {
            font-size: 16px;
            font-weight: 600;
        }

        .book-author {
            font-size: 14px;
            color: gray;
        }

        .book-rating {
            font-size: 14px;
            color: #f5a623;
        }

        .book-rating span {
            color: gray;
            margin-left: 5px;
        }

        .book-stock {
            font-size: 13px;
            font-weight: 500;
            color: green;
        }

        .book-stock.sedikit {
            color: orange;
        }

        .book-stock.habis {
            color: red;
        }

        .btn-detail {
            position: absolute;
            bottom: -50px;
            left: 14px;
            right: 14px;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #1b2741 0%, #2c3e50 100%);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            opacity: 0;
            transform: translateY(10px);
            z-index: 5;
        }

        .book:hover .btn-detail {
            opacity: 1;
            transform: translateY(0);
            bottom: 14px;
        }

        .btn-detail:hover {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 0 4px 12px rgba(27, 39, 65, 0.3);
            transform: translateY(-2px);
        }
    </style>

    <div class="container">
        <div class="header">
            <h2>Books</h2>
        </div>
        <div class="books">

            <!-- BOOK 1 -->
            @foreach ($books as $book)
                <div class="book">
                    @auth
                        <button type="button" class="wishlist-btn" data-book-id="{{ $book->id }}"
                            data-is-favorited="{{ auth()->user()->favorites->contains($book->id) ? 'true' : 'false' }}">
                            <i data-lucide="heart"
                                class="heart-icon {{ auth()->user()->favorites->contains($book->id) ? 'favorited' : '' }}"></i>
                        </button>
                    @endauth

                    @guest
                        <a href="/login" class="wishlist-btn">
                            <i data-lucide="heart" class="heart-icon"></i>
                        </a>
                    @endguest

                    <div class="book-inner">
                        <div class="book-front">
                            <div class="book-image">
                                <img src="{{ asset('storage/' . $book->cover) }}">
                            </div>

                            <div class="book-info">
                                <h3 class="book-title">{{ $book->title }}</h3>
                                <p class="book-author">{{ $book->author }}</p>

                                <div class="book-rating">★{{ number_format($book->reviews_avg_rating ?? 0, 1) }}</div>
                                <div class="book-stock">
                                    Stok tersedia: {{ $book->stock }} buku
                                </div>
                            </div>
                        </div>

                        <div class="book-back">
                            <h3>Sinopsis</h3>
                            <p>{{ Str::limit($book->description, 120) }}</p>
                        </div>
                    </div>

                    <a href="{{ route('peminjam.buku.detail', $book->id) }}" class="btn-detail">Detail Buku</a>
                </div>
            @endforeach

        </div>

    </div>


    <!-- Toast Notification -->
    <div id="toast" class="toast"></div>

    <script src="{{ asset('js/script1.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wishlistButtons = document.querySelectorAll('.wishlist-btn');

            wishlistButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Jika guest, redirect ke login
                    if (!this.hasAttribute('data-book-id')) {
                        window.location.href = '/login';
                        return;
                    }

                    const bookId = this.getAttribute('data-book-id');
                    const heartIcon = this.querySelector('.heart-icon');
                    const isFavorited = this.getAttribute('data-is-favorited') === 'true';

                    // Add click animation
                    heartIcon.classList.add('clicked');
                    setTimeout(() => {
                        heartIcon.classList.remove('clicked');
                    }, 600);

                    // Send AJAX request
                    console.log('Sending request to:', window.location.origin +
                        `/favorit/${bookId}`);
                    fetch(window.location.origin + `/favorit/${bookId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            if (response.status === 401) {
                                showToast('Sesi login telah berakhir. Silakan login kembali.',
                                    'error');
                                setTimeout(() => {
                                    window.location.href = '/login';
                                }, 2000);
                                return;
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            if (data.success) {
                                // Toggle favorited state
                                if (data.is_favorited) {
                                    heartIcon.classList.add('favorited');
                                    this.setAttribute('data-is-favorited', 'true');
                                    showToast('Buku ditambahkan ke favorit');
                                } else {
                                    heartIcon.classList.remove('favorited');
                                    this.setAttribute('data-is-favorited', 'false');
                                    showToast('Buku dihapus dari favorit');
                                }
                            } else {
                                showToast('Terjadi kesalahan', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('Terjadi kesalahan', 'error');
                        });
                });
            });

            function showToast(message, type = 'success') {
                const toast = document.getElementById('toast');
                toast.textContent = message;
                toast.className = 'toast';
                if (type === 'error') {
                    toast.classList.add('error');
                }
                toast.classList.add('show');

                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
        });
    </script>

</body>

</html>
