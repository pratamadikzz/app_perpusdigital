<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Peminjaman Buku - PustakaDigital</title>

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
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .form-body {
            padding: 40px;
        }

        .book-info-section {
            background: var(--light);
            border-radius: var(--radius);
            padding: 25px;
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary);
        }

        .book-info-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .book-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .detail-item {
            background: white;
            padding: 15px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 500;
            color: var(--dark);
            font-size: 1rem;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: block;
        }

        .form-label.required::after {
            content: " *";
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .form-control[readonly] {
            background: var(--light);
            cursor: not-allowed;
        }

        .form-text {
            color: var(--gray);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .date-inputs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .agreement-section {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border: 2px solid var(--warning);
            border-radius: var(--radius);
            padding: 25px;
            margin: 30px 0;
        }

        .agreement-title {
            font-weight: 600;
            color: #856404;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-check-input:checked {
            background-color: var(--warning);
            border-color: var(--warning);
        }

        .form-check-label {
            color: #856404;
            font-weight: 500;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: var(--gray);
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        /* Alert Styles */
        .alert {
            padding: 15px 20px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            border: 1px solid transparent;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert i {
            font-size: 1.2rem;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--radius);
            border: none;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--success) 0%, #20c997 100%);
            color: white;
            border-radius: var(--radius) var(--radius) 0 0;
            border: none;
            padding: 20px 30px;
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-body {
            padding: 30px;
        }

        .struk-container {
            background: white;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 30px;
            font-family: 'Courier New', monospace;
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
        }

        .struk-header {
            border-bottom: 2px solid var(--primary);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .struk-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary);
        }

        .struk-info {
            font-size: 0.9rem;
            color: var(--gray);
            margin: 10px 0;
        }

        .struk-divider {
            border-top: 1px dashed var(--border);
            margin: 15px 0;
        }

        .struk-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 0.9rem;
        }

        .struk-label {
            font-weight: bold;
            color: var(--gray);
        }

        .struk-value {
            color: var(--dark);
        }

        .struk-footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid var(--primary);
            font-size: 0.8rem;
            color: var(--gray);
        }

        .modal-footer {
            border: none;
            padding: 20px 30px;
            gap: 10px;
        }

        .btn-modal {
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .page-title {
                font-size: 2rem;
            }

            .form-body {
                padding: 25px 20px;
            }

            .book-details {
                grid-template-columns: 1fr;
            }

            .date-inputs {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Form Peminjaman Buku</h1>
            <p class="page-subtitle">Lengkapi informasi peminjaman buku dengan benar untuk memproses permintaan Anda</p>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Form Card -->
        <div class="form-card">
            <div class="form-header">
                <h2><i class="fas fa-book"></i> Detail Peminjaman</h2>
                <p>Informasi buku dan peminjam akan diproses secara otomatis</p>
            </div>

            <div class="form-body">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    <!-- Book Information Section -->
                    <div class="book-info-section">
                        <h3 class="book-info-title">
                            <i class="fas fa-info-circle"></i>
                            Informasi Buku
                        </h3>
                        <div class="book-details">
                            <div class="detail-item">
                                <div class="detail-label">Judul Buku</div>
                                <div class="detail-value">{{ $book->title }}</div>
                                <input type="hidden" name="buku_id" value="{{ $book->id }}">
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Penulis</div>
                                <div class="detail-value">{{ $book->author }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Penerbit</div>
                                <div class="detail-value">{{ $book->publisher ?? 'Tidak tersedia' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Stok Tersedia</div>
                                <div class="detail-value">{{ $book->stock }} buku</div>
                            </div>
                        </div>
                    </div>

                    <!-- Borrower Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i>
                            Informasi Peminjam
                        </h3>

                        <div class="form-group">
                            <label class="form-label required">Nama Peminjam</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="form-text">Peminjaman dilakukan oleh akun yang sedang login</div>
                        </div>

                        <div class="form-group">
                            <label for="nomor_peminjaman" class="form-label required">Nomor Peminjaman</label>
                            <input type="text" class="form-control" id="nomor_peminjaman" name="nomor_peminjaman"
                                placeholder="Auto Generated" readonly>
                            <div class="form-text">Nomor ini akan di-generate secara otomatis</div>
                        </div>
                    </div>

                    <!-- Date Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-calendar-alt"></i>
                            Jadwal Peminjaman
                        </h3>

                        <div class="date-inputs">
                            <div class="form-group">
                                <label for="tanggal_peminjaman" class="form-label required">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="tanggal_peminjaman"
                                    name="tanggal_peminjaman" required>
                                <div class="form-text">Tanggal mulai peminjaman buku</div>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pengembalian" class="form-label required">Tanggal
                                    Pengembalian</label>
                                <input type="date" class="form-control" id="tanggal_pengembalian"
                                    name="tanggal_pengembalian" required>
                                <div class="form-text">Tanggal paling lambat untuk pengembalian buku</div>
                            </div>
                        </div>
                    </div>

                    <!-- Agreement Section -->
                    <div class="agreement-section">
                        <h4 class="agreement-title">
                            <i class="fas fa-exclamation-triangle"></i>
                            Persetujuan & Tanggung Jawab
                        </h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="persetujuan_denda"
                                name="persetujuan_denda" required>
                            <label class="form-check-label" for="persetujuan_denda">
                                <strong>Saya siap menerima denda apabila buku hilang atau rusak</strong>
                            </label>
                        </div>
                        <div class="form-text mt-2">
                            Dengan mencentang kotak ini, Anda menyetujui untuk menanggung biaya penggantian atau
                            perbaikan buku jika buku yang dipinjam mengalami kerusakan atau kehilangan.
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check-circle"></i>
                            Buat Peminjaman
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-arrow-clockwise"></i>
                            Reset Form
                        </button>
                        <a href="{{ route('peminjam.buku.detail', $book->id) }}" class="btn btn-danger">
                            <i class="fas fa-times-circle"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Struk Peminjaman -->
    @if (isset($peminjaman) && $peminjaman)
        <div class="modal fade" id="modalStruk" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-check-circle"></i>
                            Pengajuan Peminjaman Berhasil
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div id="strukturContent">
                            <div class="struk-container">
                                <div class="struk-header">
                                    <div class="struk-title">PERPUSTAKAAN DIGITAL</div>
                                    <div class="struk-info">PustakaDigital - Sistem Modern</div>
                                </div>

                                <div class="struk-info">
                                    No: {{ $peminjaman->nomor_peminjaman }}<br>
                                    Tgl: {{ now()->format('d-m-Y H:i') }}
                                </div>

                                <div class="struk-divider"></div>

                                <div class="struk-row">
                                    <span class="struk-label">Buku:</span>
                                    <span class="struk-value">{{ $peminjaman->buku->title }}</span>
                                </div>

                                <div class="struk-row">
                                    <span class="struk-label">Penulis:</span>
                                    <span class="struk-value">{{ $peminjaman->buku->author }}</span>
                                </div>

                                <div class="struk-divider"></div>

                                <div class="struk-row">
                                    <span class="struk-label">Peminjam:</span>
                                    <span class="struk-value">{{ $peminjaman->user->name }}</span>
                                </div>

                                <div class="struk-row">
                                    <span class="struk-label">Status:</span>
                                    <span class="struk-value">{{ strtoupper($peminjaman->status) }}</span>
                                </div>

                                <div class="struk-divider"></div>

                                <div class="struk-row">
                                    <span class="struk-label">Pinjam:</span>
                                    <span class="struk-value">{{ $peminjaman->tanggal_peminjaman }}</span>
                                </div>

                                <div class="struk-row">
                                    <span class="struk-label">Kembali:</span>
                                    <span class="struk-value">{{ $peminjaman->tanggal_pengembalian }}</span>
                                </div>

                                <div class="struk-footer">
                                    <div>TERIMA KASIH</div>
                                    <div>Telah menggunakan layanan PustakaDigital</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('peminjaman.pdf', $peminjaman->id) }}" class="btn btn-primary btn-modal"
                            target="_blank">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </a>
                        <button class="btn btn-success btn-modal" id="btnPrint">
                            <i class="fas fa-print"></i>
                            Cetak
                        </button>
                        <button class="btn btn-secondary btn-modal" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Hidden struk content for PDF generation -->
    @if (isset($peminjaman) && $peminjaman)
        <style>
            #strukForPDF .struk-container {
                background: white;
                border: 2px solid #e5e7eb;
                border-radius: 8px;
                padding: 30px;
                font-family: 'Courier New', monospace;
                text-align: center;
                max-width: 400px;
                margin: 0 auto;
                box-sizing: border-box;
            }

            #strukForPDF .struk-header {
                border-bottom: 2px solid #3b82f6;
                padding-bottom: 15px;
                margin-bottom: 20px;
            }

            #strukForPDF .struk-title {
                font-size: 1.2rem;
                font-weight: bold;
                color: #3b82f6;
            }

            #strukForPDF .struk-info {
                font-size: 0.9rem;
                color: #6b7280;
                margin: 10px 0;
            }

            #strukForPDF .struk-divider {
                border-top: 1px dashed #e5e7eb;
                margin: 15px 0;
            }

            #strukForPDF .struk-row {
                display: flex;
                justify-content: space-between;
                margin: 8px 0;
                font-size: 0.9rem;
            }

            #strukForPDF .struk-label {
                font-weight: bold;
                color: #6b7280;
            }

            #strukForPDF .struk-value {
                color: #1f2937;
            }

            #strukForPDF .struk-footer {
                margin-top: 20px;
                padding-top: 15px;
                border-top: 2px solid #3b82f6;
                font-size: 0.8rem;
                color: #6b7280;
            }
        </style>
        <div id="strukForPDF" style="display: none; position: absolute; left: -9999px;">
            <div class="struk-container">
                <div class="struk-header">
                    <div class="struk-title">PERPUSTAKAAN DIGITAL</div>
                    <div class="struk-info">PustakaDigital - Sistem Modern</div>
                </div>

                <div class="struk-info">
                    No: {{ $peminjaman->nomor_peminjaman }}<br>
                    Tgl: {{ now()->format('d-m-Y H:i') }}
                </div>

                <div class="struk-divider"></div>

                <div class="struk-row">
                    <span class="struk-label">Buku:</span>
                    <span class="struk-value">{{ $peminjaman->buku->title }}</span>
                </div>

                <div class="struk-row">
                    <span class="struk-label">Penulis:</span>
                    <span class="struk-value">{{ $peminjaman->buku->author }}</span>
                </div>

                <div class="struk-divider"></div>

                <div class="struk-row">
                    <span class="struk-label">Peminjam:</span>
                    <span class="struk-value">{{ $peminjaman->user->name }}</span>
                </div>

                <div class="struk-row">
                    <span class="struk-label">Status:</span>
                    <span class="struk-value">{{ strtoupper($peminjaman->status) }}</span>
                </div>

                <div class="struk-divider"></div>

                <div class="struk-row">
                    <span class="struk-label">Pinjam:</span>
                    <span class="struk-value">{{ $peminjaman->tanggal_peminjaman }}</span>
                </div>

                <div class="struk-row">
                    <span class="struk-label">Kembali:</span>
                    <span class="struk-value">{{ $peminjaman->tanggal_pengembalian }}</span>
                </div>

                <div class="struk-footer">
                    <div>TERIMA KASIH</div>
                    <div>Telah menggunakan layanan PustakaDigital</div>
                </div>
            </div>
        </div>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-generate nomor peminjaman
        document.addEventListener('DOMContentLoaded', function() {
            const nomorInput = document.getElementById('nomor_peminjaman');
            if (!nomorInput.value) {
                const timestamp = Date.now();
                const random = Math.floor(Math.random() * 1000);
                nomorInput.value = `PMJ-${timestamp}-${random}`;
            }

            // Set minimum date untuk tanggal peminjaman (hari ini)
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal_peminjaman').min = today;
            document.getElementById('tanggal_peminjaman').value = today;

            // Set minimum date untuk tanggal pengembalian (besok)
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const tomorrowStr = tomorrow.toISOString().split('T')[0];
            document.getElementById('tanggal_pengembalian').min = tomorrowStr;

            // Update tanggal pengembalian ketika tanggal peminjaman berubah
            document.getElementById('tanggal_peminjaman').addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                selectedDate.setDate(selectedDate.getDate() + 7); // Default 7 hari
                const returnDate = selectedDate.toISOString().split('T')[0];
                document.getElementById('tanggal_pengembalian').value = returnDate;
            });
        });

        // Modal handling
        @if (isset($peminjaman) && $peminjaman)
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById('modalStruk'));
                modal.show();
            });
        @endif

        // Print functionality
        document.getElementById("btnPrint")?.addEventListener("click", function() {
            var printContents = document.getElementById("strukturContent").innerHTML;
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write(`
                <html>
                    <head>
                        <title>Bukti Peminjaman - PustakaDigital</title>
                        <style>
                            body { font-family: 'Courier New', monospace; text-align: center; margin: 20px; }
                            .struk-container { max-width: 400px; margin: 0 auto; }
                        </style>
                    </head>
                    <body>
                        ${printContents}
                    </body>
                </html>
            `);
            newWindow.document.close();
            newWindow.print();
        });

        // Form validation enhancement
        document.querySelector('form').addEventListener('submit', function(e) {
            const tanggalPinjam = new Date(document.getElementById('tanggal_peminjaman').value);
            const tanggalKembali = new Date(document.getElementById('tanggal_pengembalian').value);

            if (tanggalKembali <= tanggalPinjam) {
                e.preventDefault();
                alert('Tanggal pengembalian harus lebih besar dari tanggal peminjaman!');
                return false;
            }

            const diffTime = Math.abs(tanggalKembali - tanggalPinjam);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays > 30) {
                if (!confirm('Peminjaman lebih dari 30 hari. Apakah Anda yakin?')) {
                    e.preventDefault();
                    return false;
                }
            }
        });
    </script>
</body>

</html>
