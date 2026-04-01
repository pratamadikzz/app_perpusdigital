<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            justify-content: center;
            width: 100%;
            box-shadow: 0 2px 8px rgba(249, 115, 22, 0.3);
        }

        .btn-ulasan:hover {
            background: linear-gradient(135deg, #ea580c 0%, #dc2626 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4);
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

        .review-completed {
            animation: fadeInUp 0.6s ease-out;
            transition: all 0.3s ease;
        }

        .review-completed:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
                            @elseif ($pinjam->status == 'dikembalikan' || $pinjam->status == 'selesai')
                                @if ($pinjam->sudahUlasan)
                                    <div class="review-completed" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 12px 16px; border-radius: 12px; text-align: center; color: white; font-weight: 600; font-size: 13px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3); border: 2px solid #047857;">
                                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                        Sudah Memberikan Ulasan
                                        @if($pinjam->userReview)
                                            <div style="font-size: 11px; opacity: 0.9; margin-top: 4px;">
                                                Rating Anda: {{ str_repeat('⭐', $pinjam->userReview->rating) }} ({{ $pinjam->userReview->rating }}/5)
                                            </div>
                                        @endif
                                        <div style="font-size: 11px; opacity: 0.9; margin-top: 2px;">
                                            Terima kasih atas feedback Anda! 💝
                                        </div>
                                    </div>
                                @else
                                    <button type="button" class="btn-ulasan"
                                        onclick="toggleReviewForm({{ $pinjam->id }})">
                                        <i class="fas fa-star"></i> Beri Ulasan
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
                    @php
                        $bolehUlas = false;
                        if (in_array($pinjam->status, ['dikembalikan', 'selesai'])) {
                            // Pastikan user sudah pernah meminjam buku ini
                            $sudahPinjam = \App\Models\Peminjaman::where('user_id', auth()->id())
                                ->where('buku_id', $pinjam->book->id)
                                ->whereIn('status', ['dikembalikan', 'selesai'])
                                ->exists();

                            if ($sudahPinjam) {
                                $bolehUlas = true;
                            }
                        }
                    @endphp

                    @if ($bolehUlas && !$pinjam->sudahUlasan)
                        <div id="review-form-{{ $pinjam->id }}" style="display: none; margin-bottom: 16px;">
                            <div
                                style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: 2px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #f97316, #10b981, #3b82f6);"></div>
                                <h4 style="margin-top: 0; margin-bottom: 20px; color: #1f2937; font-size: 18px; display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-star" style="color: #f97316;"></i>
                                    Beri Ulasan untuk <strong>"{{ $pinjam->book->title }}"</strong>
                                </h4>
                                <p style="color: #6b7280; font-size: 14px; margin-bottom: 20px; padding: 12px; background: #f8fafc; border-radius: 8px; border-left: 3px solid #f97316;">
                                    <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                                    Ulasan Anda akan membantu pembaca lain dalam memilih buku yang tepat. Bagikan pengalaman membaca Anda! 📚
                                </p>
                                <form action="{{ route('review.store') }}" method="POST" class="review-form" onsubmit="return validateReviewForm(this)">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $pinjam->book->id }}">

                                    <label for="rating-{{ $pinjam->id }}">Rating <span style="color: #dc2626;">*</span></label>
                                    <select name="rating" id="rating-{{ $pinjam->id }}" required style="margin-bottom: 12px;">
                                        <option value="">Pilih Rating</option>
                                        <option value="5">⭐⭐⭐⭐⭐ - Sangat Bagus (5)</option>
                                        <option value="4">⭐⭐⭐⭐ - Bagus (4)</option>
                                        <option value="3">⭐⭐⭐ - Cukup (3)</option>
                                        <option value="2">⭐⭐ - Kurang (2)</option>
                                        <option value="1">⭐ - Buruk (1)</option>
                                    </select>

                                    <label for="ulasan-{{ $pinjam->id }}">Ulasan Anda <span style="color: #dc2626;">*</span></label>
                                    <textarea name="ulasan" id="ulasan-{{ $pinjam->id }}" placeholder="Bagikan pengalaman membaca buku ini..." required style="margin-bottom: 12px; resize: vertical;"></textarea>

                                    <div style="display: flex; gap: 10px;">
                                        <button type="submit" class="btn-ulasan" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);">
                                            <i class="fas fa-paper-plane"></i> Kirim Ulasan
                                        </button>
                                        <button type="button" class="btn-kembali" style="background: #6b7280;"
                                            onclick="toggleReviewForm({{ $pinjam->id }})">
                                            <i class="fas fa-times"></i> Batal
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
                if (form.style.display === 'none' || form.style.display === '') {
                    form.style.display = 'block';
                    form.style.animation = 'slideDown 0.4s ease-out';
                    // Scroll to form
                    setTimeout(() => {
                        form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                } else {
                    form.style.animation = 'slideUp 0.3s ease-in';
                    setTimeout(() => {
                        form.style.display = 'none';
                    }, 300);
                }
            }
        }

        // Auto-show success animation if there's a success message
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.querySelector('.alert-success');
            if (successAlert && successAlert.textContent.includes('ulasan')) {
                // Add confetti effect or celebration
                setTimeout(() => {
                    showSuccessAnimation();
                }, 500);
            }
        });

        function validateReviewForm(form) {
            const rating = form.querySelector('select[name="rating"]').value;
            const ulasan = form.querySelector('textarea[name="ulasan"]').value.trim();

            if (!rating) {
                alert('Silakan pilih rating terlebih dahulu!');
                return false;
            }

            if (ulasan.length < 10) {
                alert('Ulasan minimal 10 karakter!');
                return false;
            }

            if (ulasan.length > 1000) {
                alert('Ulasan maksimal 1000 karakter!');
                return false;
            }

            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;

            return true;
        }

        function createFloatingStar() {
            const star = document.createElement('div');
            star.innerHTML = '⭐';
            star.style.position = 'fixed';
            star.style.left = Math.random() * window.innerWidth + 'px';
            star.style.top = window.innerHeight + 'px';
            star.style.fontSize = '24px';
            star.style.zIndex = '9999';
            star.style.pointerEvents = 'none';
            star.style.animation = 'floatUp 2s ease-out forwards';

            document.body.appendChild(star);

            setTimeout(() => {
                star.remove();
            }, 2000);
        }
    </script>

    <style>
        @keyframes floatUp {
            from {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            to {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>

    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
                max-height: 0;
            }
            to {
                opacity: 1;
                transform: translateY(0);
                max-height: 500px;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                transform: translateY(0);
                max-height: 500px;
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
                max-height: 0;
            }
        }
    </style>
</body>

</html>
