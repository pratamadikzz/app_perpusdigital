<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.grid-buku {
    display: grid;
    grid-template-columns: repeat(auto-fill, 200px);
    gap: 20px;
}

/* CARD */
.book {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,.1);
    transition: .2s;
}

.book:hover {
    transform: translateY(-5px);
}

.book-image img {
    width: 100%;
    height: 260px;
    object-fit: cover;
}

.book-info {
    padding: 12px;
}

.book-title {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 3px;
}

.book-author {
    font-size: 13px;
    color: gray;
    margin-bottom: 8px;
}

.book-stock {
    font-size: 12px;
    margin-bottom: 10px;
}

.btn-detail {
    width: 100%;
    border: none;
    background: #2563eb;
    color: white;
    padding: 7px;
    border-radius: 6px;
    cursor: pointer;
}
</style>

</head>
<body>

@include('components.sidebar')
@include('components.navbar')

<div class="container py-4">

<h3 class="mb-4">
Kategori: {{ $kategori->NamaKategori }}
</h3>

<div class="grid-buku">

@foreach ($buku as $item)
<div class="book">

    <div class="book-image">
        <img src="{{ asset('storage/'.$item->cover) }}">
    </div>

    <div class="book-info">
        <div class="book-title">{{ $item->title }}</div>
        <div class="book-author">{{ $item->author }}</div>

        <div class="book-stock">
            Stok: {{ $item->stock }} buku
        </div>

        <button class="btn-detail"
            data-bs-toggle="modal"
            data-bs-target="#detail{{ $item->id }}">
            Detail Buku
        </button>
    </div>

</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="detail{{ $item->id }}">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">{{ $item->title }}</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body row">

<div class="col-md-4">
<img src="{{ asset('storage/'.$item->cover) }}" class="img-fluid rounded">
</div>

<div class="col-md-8">
<p><b>Penulis:</b> {{ $item->author }}</p>
<p><b>Penerbit:</b> {{ $item->publisher }}</p>
<p><b>Tahun:</b> {{ $item->publication_year }}</p>
<p><b>Stok:</b> {{ $item->stock }}</p>

<hr>

<h6>Deskripsi Buku</h6>
<p>{{ $item->description }}</p>
</div>

</div>

<div class="modal-footer">
<button class="btn btn-secondary" data-bs-dismiss="modal">
Tutup
</button>
</div>

</div>
</div>
</div>

@endforeach

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
