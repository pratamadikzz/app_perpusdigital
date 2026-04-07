<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Buku - Petugas | PustakaDigital</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        /* Layout utama */
        .main {
            margin-left: 270px; /* sesuaikan dengan lebar sidebar */
        }

        .content {
            padding: 30px;
            min-height: 100vh;
        }

        /* Header */
        .page-header {
            background: white;
            padding: 24px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h2 {
            margin: 0;
            font-size: 28px;
            color: #1e293b;
        }

        /* Card */
        .card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 40px rgba(15, 23, 42, .06);
        }

        /* Table */
        .table thead th {
            background: #1e40af;
            color: #fff;
            border: none;
        }

        .table tbody tr:hover {
            background: #f1f5ff;
        }

        .review-text {
            color: #475569;
        }
    </style>
</head>

<body>

    {{-- Sidebar --}}
    @include('petugas.dataBuku.components.sidebar')

    {{-- Main Content --}}
    <div class="main">

        {{-- Navbar --}}
        @include('petugas.dataBuku.components.nav')

        <div class="content">

            {{-- Header --}}
            <div class="page-header">
                <div>
                    <h2>
                        <i class="fas fa-star text-primary me-2"></i>
                        Ulasan Buku
                    </h2>
                    <p class="text-muted mb-0">
                        Daftar ulasan pembaca yang tersedia untuk pengelolaan.
                    </p>
                </div>

                <span class="badge bg-primary py-2 px-3">
                    {{ $reviews->count() }} Ulasan
                </span>
            </div>

            {{-- Table Card --}}
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th>Rating</th>
                                    <th>Ulasan</th>
                                    <th width="150">Tanggal</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($reviews as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $review->user->name ?? 'Guest' }}</td>
                                        <td>{{ $review->book->title ?? '-' }}</td>
                                        <td>{{ $review->rating }}/5</td>
                                        <td class="review-text">
                                            {{ Str::limit($review->ulasan, 120) }}
                                        </td>
                                        <td>
                                            {{ $review->created_at 
                                                ? $review->created_at->format('d M Y') 
                                                : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            Belum ada ulasan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>