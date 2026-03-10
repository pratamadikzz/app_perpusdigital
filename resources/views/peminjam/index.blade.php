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
    <div class="section">
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
    </div>


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
        }

        .book-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .book:hover:not(:has(.btn-detail:hover)) .book-inner {
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

        .book-info {
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 6px;
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
            margin-top: 8px;
            padding: 8px;
            border: none;
            border-radius: 8px;
            background: #1b2741;
            color: white;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-detail:hover {
            opacity: 0.9;
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
                    <form action="{{ route('favorit.toggle', $book->id) }}" method="POST">
                        @csrf
                        @auth
                            <button type="submit" style="background:none;border:none;">
                                <i data-lucide="heart"
                                    style="color:
           {{ auth()->user()->favorites->contains($book->id) ? 'red' : 'gray' }};
           ">
                                </i>
                            </button>
                        @endauth

                        @guest
                            <a href="/login">
                                <i data-lucide="heart" style="color: gray;"></i>
                            </a>
                        @endguest
                    </form>

                    <div class="book-inner">
                        <div class="book-front">
                            <div class="book-image">
                                <img src="{{ asset('storage/' . $book->cover) }}">
                            </div>

                            <div class="book-info">
                                <h3 class="book-title">{{ $book->title }}</h3>
                                <p class="book-author">{{ $book->author }}</p>

                                <div class="book-rating">★★★★☆ <span>(4.0)</span></div>
                                <div class="book-stock">
                                    Stok tersedia: {{ $book->stock }} buku
                                </div>

                                <a href="{{ route('peminjam.buku.detail', $book->id) }}" class="btn-detail">Detail
                                    Buku</a>
                            </div>
                        </div>

                        <div class="book-back">
                            <h3>Sinopsis</h3>
                            <p>{{ Str::limit($book->description, 120) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>


    <script src="{{ asset('js/script1.js') }}"></script>


</body>

</html>
