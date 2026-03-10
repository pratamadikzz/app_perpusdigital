<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>


</head>

<body>

    @include('partials.navbar')
    <div class="container">

        <div class="books">
            @foreach ($peminjamans as $pinjam)
                <div class="book">

                    <div class="book-inner">
                        <div class="book-front">

                            <div class="book-image">
                                <img src="{{ asset('storage/' . $pinjam->book->cover) }}">
                            </div>

                            <div class="book-info">
                                <h3 class="book-title">{{ $pinjam->book->title }}</h3>
                                <p class="book-author">{{ $pinjam->book->author }}</p>

                                {{-- STATUS --}}
                                <div class="book-stock">
                                    Status:

                                    @if ($pinjam->status == 'aktif')
                                        <span style="color:blue;font-weight:bold;">Sedang Dipinjam</span>
                                    @elseif ($pinjam->status == 'menunggu')
                                        <span style="color:orange;font-weight:bold;">Menunggu Persetujuan</span>
                                    @elseif ($pinjam->status == 'dikembalikan')
                                        <span style="color:green;font-weight:bold;">Selesai</span>
                                    @elseif ($pinjam->status == 'ditolak')
                                        <span style="color:red;font-weight:bold;">Ditolak</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Tombol kembalikan kalau masih dipinjam --}}
                            @if ($pinjam->status == 'aktif')
                                <form action="{{ route('peminjaman.kembalikan', $pinjam->id) }}" method="POST">
                                    @csrf
                                    <button class="btn-detail">
                                        Kembalikan Buku
                                    </button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>

        </div>
        @endforeach
    </div>

    </div>
    <script src="{{ asset('js/script1.js') }}"></script>
</body>

</html>
