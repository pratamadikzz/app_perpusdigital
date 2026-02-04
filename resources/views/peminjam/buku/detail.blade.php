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

    <div class="row">
        <!-- Cover Buku -->
        <div class="col-md-4">
            <img src="/images/buku.jpg" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Detail Buku -->
        <div class="col-md-8 content-right">
            <h5 class="text-muted">Penulis</h5>

            <h2 class="fw-bold">
                Cara Melawan Rasa Malas
            </h2>

            <h3 class="fw-bold mt-3 mb-3">
                RP.160.000
            </h3>

            <button class="btn btn-primary px-4 py-2">
                + Keranjang
            </button>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="mt-5">
        <h4 class="fw-bold">Deskripsi</h4>
        <p class="text-muted">
            Buku ini membantu pembaca memahami cara mengatasi rasa malas,
            meningkatkan produktivitas, serta membangun kebiasaan positif
            dalam kehidupan sehari-hari melalui metode yang mudah diterapkan.
        </p>
    </div>

    <!-- Detail Buku -->
    <div class="mt-4">
        <h4 class="fw-bold">Detail Buku</h4>

        <div class="row mt-3">
            <div class="col-md-6">
                <p><b>Penerbit:</b> Penerbit Contoh</p>
                <p><b>ISBN:</b> 978xxxxxxx</p>
                <p><b>Bahasa:</b> Indonesia</p>
                <p><b>Lebar:</b> 21 cm</p>
            </div>

            <div class="col-md-6">
                <p><b>Tanggal Terbit:</b> 2026</p>
                <p><b>Halaman:</b> 300</p>
                <p><b>Panjang:</b> 30 cm</p>
                <p><b>Berat:</b> 500 gr</p>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('js/script1.js') }}"></script>
</body>

</html>
