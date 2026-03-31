<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman - {{ $peminjaman->nomor_peminjaman }}</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 20px;
            background: white;
            color: #333;
        }

        .struk-container {
            max-width: 400px;
            margin: 0 auto;
            border: 2px solid #333;
            padding: 30px;
            text-align: center;
        }

        .struk-header {
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .struk-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .struk-subtitle {
            font-size: 0.9rem;
            color: #666;
        }

        .struk-info {
            font-size: 0.9rem;
            margin: 10px 0;
            text-align: center;
        }

        .struk-divider {
            border-top: 1px dashed #333;
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
        }

        .struk-footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #333;
            font-size: 0.8rem;
            text-align: center;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-aktif {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-dikembalikan {
            background: #d4edda;
            color: #155724;
        }

        .status-ditolak {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="struk-container">
        <div class="struk-header">
            <div class="struk-title">PERPUSTAKAAN DIGITAL</div>
            <div class="struk-subtitle">PustakaDigital - Sistem Modern</div>
        </div>

        <div class="struk-info">
            <strong>No: {{ $peminjaman->nomor_peminjaman }}</strong><br>
            Tgl: {{ now()->format('d-m-Y H:i') }}
        </div>

        <div class="struk-divider"></div>

        <div class="struk-row">
            <span class="struk-label">Buku:</span>
            <span>{{ $peminjaman->buku->title }}</span>
        </div>

        <div class="struk-row">
            <span class="struk-label">Penulis:</span>
            <span>{{ $peminjaman->buku->author }}</span>
        </div>

        <div class="struk-divider"></div>

        <div class="struk-row">
            <span class="struk-label">Peminjam:</span>
            <span>{{ $peminjaman->user->name }}</span>
        </div>

        <div class="struk-row">
            <span class="struk-label">Status:</span>
            <span class="status-badge status-{{ strtolower($peminjaman->status) }}">
                {{ strtoupper($peminjaman->status) }}
            </span>
        </div>

        <div class="struk-divider"></div>

        <div class="struk-row">
            <span class="struk-label">Pinjam:</span>
            <span>{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d/m/Y') }}</span>
        </div>

        <div class="struk-row">
            <span class="struk-label">Kembali:</span>
            <span>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d/m/Y') }}</span>
        </div>

        <div class="struk-footer">
            <div><strong>TERIMA KASIH</strong></div>
            <div>Telah menggunakan layanan PustakaDigital</div>
            <div style="margin-top: 10px; font-size: 0.7rem; color: #666;">
                Dokumen ini dihasilkan secara otomatis pada {{ now()->format('d-m-Y H:i:s') }}
            </div>
        </div>
    </div>
</body>

</html>
