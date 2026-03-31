<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .riwayat-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .riwayat-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #1b2741;
        }

        .riwayat-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .riwayat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            display: grid;
            grid-template-columns: 120px 1fr 200px;
            gap: 20px;
            align-items: start;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .riwayat-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .riwayat-cover {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .riwayat-info h4 {
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 6px 0;
            color: #1b2741;
        }

        .riwayat-info p {
            font-size: 13px;
            color: #666;
            margin: 4px 0;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }

        .status-aktif {
            background: #d1fae5;
            color: #047857;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #b45309;
        }

        .status-selesai {
            background: #d1d5db;
            color: #374151;
        }

        .status-ditolak {
            background: #fee2e2;
            color: #dc2626;
        }

        .riwayat-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-kembali {
            padding: 8px 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-kembali:hover {
            background: #1d4ed8;
        }

        .btn-ulasan {
            padding: 10px 16px;
            background: #f97316;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-ulasan:hover {
            background: #ea580c;
        }

        .review-form {
            background: #f9fafb;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .review-form label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .review-form select,
        .review-form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 13px;
            font-family: inherit;
            margin-bottom: 10px;
        }

        .review-form textarea {
            min-height: 80px;
            resize: vertical;
        }

        .alasan-penolakan {
            background: #fee2e2;
            padding: 16px;
            border-radius: 8px;
            border-left: 4px solid #dc2626;
            margin-top: 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .alasan-penolakan strong {
            color: #991b1b;
            display: block;
            margin-bottom: 8px;
        }

        .alasan-penolakan p {
            margin: 8px 0;
            color: #7f1d1d;
        }

        .alasan-penolakan .alasan-label,
        .alasan-penolakan .denda-label {
            font-weight: 700;
            color: #991b1b;
            display: inline-block;
            width: 70px;
        }

        .alasan-penolakan .alasan-value,
        .alasan-penolakan .denda-value {
            color: #7f1d1d;
        }

        @media (max-width: 768px) {
            .riwayat-card {
                grid-template-columns: 1fr;
            }

            .riwayat-cover {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <div class="riwayat-container">
        <h1 class="riwayat-title">📚 Riwayat Peminjaman</h1>

        @if ($peminjamans->isEmpty())
            <div style="text-align: center; padding: 40px; color: #999;">
                <p>Anda belum memiliki riwayat peminjaman</p>
            </div>
        @else
            <div class="riwayat-list">
                @foreach ($peminjamans as $pinjam)
                    <div class="riwayat-card">
                        <!-- Cover -->
                        <img src="{{ asset('storage/' . $pinjam->book->cover) }}" alt="{{ $pinjam->book->title }}"
                            class="riwayat-cover">

                        <!-- Info Buku -->
                        <div class="riwayat-info">
                            <h4>{{ $pinjam->book->title }}</h4>
                            <p><strong>Penulis:</strong> {{ $pinjam->book->author }}</p>
                            <p><strong>Tanggal Peminjaman:</strong>
                                {{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</p>
                            <p><strong>Batas Pengembalian:</strong>
                                {{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') }}</p>

                            @if ($pinjam->status == 'aktif')
                                <span class="status-badge status-aktif">Sedang Dipinjam</span>
                            @elseif ($pinjam->status == 'menunggu' && !$pinjam->alasan_penolakan)
                                <span class="status-badge status-menunggu">Menunggu Persetujuan</span>
                            @elseif ($pinjam->status == 'menunggu' && $pinjam->alasan_penolakan)
                                <span class="status-badge status-ditolak">⚠️ Pengembalian Ditolak</span>
                            @elseif ($pinjam->status == 'dikembalikan')
                                <span class="status-badge status-selesai">Selesai</span>
                            @elseif ($pinjam->status == 'selesai')
                                <span class="status-badge status-selesai">✓ Selesai</span>
                            @elseif ($pinjam->status == 'ditolak')
                                <span class="status-badge status-ditolak">Ditolak</span>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="riwayat-actions">
                            @if ($pinjam->status == 'aktif')
                                <form action="{{ route('peminjaman.kembalikan', $pinjam->id) }}" method="POST"
                                    style="width: 100%;">
                                    @csrf
                                    <button type="submit" class="btn-kembali" style="width: 100%;">
                                        Kembalikan Buku
                                    </button>
                                </form>
                            @elseif ($pinjam->status == 'dikembalikan')
                                @if ($pinjam->sudahUlasan)
                                    <div
                                        style="background: #d1fae5; padding: 10px 16px; border-radius: 8px; text-align: center; font-weight: 600; color: #047857; font-size: 13px;">
                                        ✓ Sudah Diberi Ulasan
                                    </div>
                                @else
                                    <button type="button" class="btn-ulasan"
                                        onclick="toggleReviewForm({{ $pinjam->id }})">
                                        ✍️ Beri Ulasan
                                    </button>
                                @endif
                            @elseif ($pinjam->status == 'menunggu' && $pinjam->alasan_penolakan)
                                <div class="alasan-penolakan">
                                    <strong>⚠️ Pengembalian Ditolak</strong>
                                    <p>
                                        <span class="alasan-label">Alasan:</span>
                                        <span class="alasan-value">
                                            @if ($pinjam->alasan_penolakan == 'hilang')
                                                Buku Hilang
                                            @elseif($pinjam->alasan_penolakan == 'rusak')
                                                Buku Rusak
                                            @elseif($pinjam->alasan_penolakan == 'terlambat')
                                                Terlambat
                                            @else
                                                {{ $pinjam->alasan_penolakan ?? '-' }}
                                            @endif
                                        </span>
                                    </p>
                                    @if ($pinjam->denda && $pinjam->denda > 0)
                                        <p>
                                            <span class="denda-label">Denda:</span>
                                            <span class="denda-value">Rp
                                                {{ number_format($pinjam->denda, 0, ',', '.') }}</span>
                                        </p>
                                    @endif
                                    <p style="font-size: 13px; color: #7f1d1d; margin-top: 12px;">
                                        <i class="fas fa-info-circle"></i> Silakan bertanggung jawab (bayar denda atau
                                        ganti buku). Admin akan confirm setelah itu.
                                    </p>
                                </div>
                            @elseif ($pinjam->status == 'selesai' && $pinjam->alasan_penolakan)
                                <div
                                    style="background: #d1fae5; padding: 16px; border-radius: 8px; border-left: 4px solid #059669; color: #065f46;">
                                    <strong style="color: #047857; display: block; margin-bottom: 8px;">✓ Penolakan
                                        Sudah Diselesaikan</strong>
                                    <p style="margin: 8px 0; font-size: 13px;">
                                        <strong>Alasan:</strong>
                                        @if ($pinjam->alasan_penolakan == 'hilang')
                                            Buku Hilang
                                        @elseif($pinjam->alasan_penolakan == 'rusak')
                                            Buku Rusak
                                        @elseif($pinjam->alasan_penolakan == 'terlambat')
                                            Terlambat
                                        @else
                                            {{ $pinjam->alasan_penolakan ?? '-' }}
                                        @endif
                                    </p>
                                    @if ($pinjam->denda && $pinjam->denda > 0)
                                        <p style="margin: 8px 0; font-size: 13px;">
                                            <strong>Denda Dibayar:</strong> Rp
                                            {{ number_format($pinjam->denda, 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>
                            @elseif ($pinjam->status == 'ditolak')
                                <div class="alasan-penolakan">
                                    <strong>⚠️ Permintaan Peminjaman Ditolak</strong>
                                    <p>
                                        <span class="alasan-label">Alasan:</span>
                                        <span class="alasan-value">
                                            @if ($pinjam->alasan_penolakan == 'hilang')
                                                Buku Hilang
                                            @elseif($pinjam->alasan_penolakan == 'rusak')
                                                Buku Rusak
                                            @elseif($pinjam->alasan_penolakan == 'terlambat')
                                                Terlambat
                                            @else
                                                {{ $pinjam->alasan_penolakan ?? '-' }}
                                            @endif
                                        </span>
                                    </p>
                                    @if ($pinjam->denda && $pinjam->denda > 0)
                                        <p>
                                            <span class="denda-label">Denda:</span>
                                            <span class="denda-value">Rp
                                                {{ number_format($pinjam->denda, 0, ',', '.') }}</span>
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Form Ulasan (Hidden by default) -->
                    @if ($pinjam->status == 'dikembalikan' && !$pinjam->sudahUlasan)
                        <div id="review-form-{{ $pinjam->id }}" style="display: none; margin-bottom: 16px;">
                            <div
                                style="background: white; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px;">
                                <h4 style="margin-top: 0;">Beri Ulasan untuk {{ $pinjam->book->title }}</h4>
                                <form action="{{ route('review.store') }}" method="POST" class="review-form">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $pinjam->book->id }}">

                                    <label for="rating-{{ $pinjam->id }}">Rating</label>
                                    <select name="rating" id="rating-{{ $pinjam->id }}" required>
                                        <option value="">Pilih Rating</option>
                                        <option value="5">⭐⭐⭐⭐⭐ - Sangat Baik</option>
                                        <option value="4">⭐⭐⭐⭐ - Baik</option>
                                        <option value="3">⭐⭐⭐ - Cukup</option>
                                        <option value="2">⭐⭐ - Kurang</option>
                                        <option value="1">⭐ - Buruk</option>
                                    </select>

                                    <label for="ulasan-{{ $pinjam->id }}">Ulasan</label>
                                    <textarea name="ulasan" id="ulasan-{{ $pinjam->id }}" placeholder="Tulis ulasan buku..." required></textarea>

                                    <div style="display: flex; gap: 10px;">
                                        <button type="submit" class="btn-ulasan">Kirim Ulasan</button>
                                        <button type="button" class="btn-kembali" style="background: #6b7280;"
                                            onclick="toggleReviewForm({{ $pinjam->id }})">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    <script src="{{ asset('js/script1.js') }}"></script>
    <script>
        function toggleReviewForm(id) {
            const form = document.getElementById('review-form-' + id);
            if (form) {
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
            }
        }
    </script>
</body>

</html>
