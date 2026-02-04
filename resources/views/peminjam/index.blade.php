<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PustakaDigital</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

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
        <div class="category">
            <i data-lucide="book-text"></i>
            <span>Fiksi</span>
        </div>
        <div class="category">
            <i data-lucide="library"></i>
            <span>Non Fiksi</span>
        </div>
        <div class="category">
            <i data-lucide="baby"></i>
            <span>Anak</span>
        </div>
        <div class="category">
            <i data-lucide="graduation-cap"></i>
            <span>Edukasi</span>
        </div>
        <div class="category">
            <i data-lucide="laptop"></i>
            <span>Teknologi</span>
        </div>
    </div>


    <!-- BUKU TERLARIS -->
    <div class="section">
        <h2>Rekomendasi Buku</h2>

        <div class="books">
            <div class="book">
                <img src="{{ asset('img/algoritma.jpeg') }}" alt="">
                <h4>Algoritma Dasar</h4>
                <span>Rekomendasi</span>
            </div>

            <div class="book">
                <img src="{{ asset('img/pemrograman.jpeg') }}" alt="">
                <h4>Pemrograman Web</h4>
                <span>Rekomendasi</span>
            </div>

            <div class="book">
                <img src="{{ asset('img/basis.jpeg') }}" alt="">
                <h4>Basis Data</h4>
                <span>Rekomendasi</span>
            </div>

            <div class="book">
                <img src="{{ asset('img/ui.jpeg') }}" alt="">
                <h4>UI/UX Design</h4>
                <span>Rekomendasi</span>
            </div>

            <div class="book">
                <img src="" alt="">
                <h4>Kecerdasan Buatan</h4>
                <span>Rekomendasi</span>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script1.js') }}"></script>


</body>

</html>
