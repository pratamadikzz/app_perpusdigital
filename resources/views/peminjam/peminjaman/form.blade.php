<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Peminjaman Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .required::after {
            content: " *";
            color: #dc3545;
        }

        .btn-container {
            margin-top: 30px;
            text-align: center;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .checkbox-agreement {
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #ffc107;
            border-radius: 4px;
        }

        /* Styling untuk Struk Peminjaman */
        .struk-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
            font-family: 'Courier New', monospace;
            line-height: 1.8;
        }

        .struk-header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .struk-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .struk-subtitle {
            font-size: 12px;
            color: #666;
        }

        .struk-body {
            font-size: 13px;
            margin-bottom: 20px;
        }

        .struk-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            padding: 0 5px;
        }

        .struk-label {
            font-weight: bold;
            min-width: 120px;
        }

        .struk-value {
            flex: 1;
            text-align: right;
        }

        .struk-divider {
            border-top: 1px dashed #333;
            margin: 15px 0;
        }

        .struk-footer {
            text-align: center;
            border-top: 2px solid #333;
            padding-top: 15px;
            font-size: 12px;
            color: #666;
        }

        .struk-footer p {
            margin: 0;
            margin-bottom: 5px;
        }

        .struk-nomor {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .struk-qr {
            font-size: 11px;
            text-align: center;
            color: #999;
        }

        .modal-body {
            max-height: 80vh;
            overflow-y: auto;
        }

        .btn-print {
            margin-top: 15px;
        }

        @media print {
            body {
                background-color: white;
            }

            .struk-container {
                box-shadow: none;
            }

            .btn-group {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <h1 class="form-title">Form Peminjaman Buku</h1>

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf

                        <!-- Nomor Peminjaman -->
                        <div class="form-group">
                            <label for="nomor_peminjaman" class="form-label required">Nomor Peminjaman</label>
                            <input type="text" class="form-control" id="nomor_peminjaman" name="nomor_peminjaman"
                                placeholder="Auto Generated" readonly>
                            <small class="text-muted">Nomor ini akan di-generate secara otomatis</small>
                        </div>

                        <div class="form-group">
                            <label for="nomor_peminjaman" class="form-label required">Judul</label>
                            <input type="text" class="form-control" value="{{ $book->title }}" readonly>
                            <input type="hidden" name="buku_id" value="{{ $book->id }}">
                            <small class="text-muted">Judul Buku</small>
                        </div>

                        <div class="form-group">
                            <label for="nomor_peminjaman" class="form-label required">Penulis</label>
                            <input type="text" class="form-control" value="{{ $book->author }}" readonly>
                            <input type="hidden" name="buku_id" value="{{ $book->id }}">
                            <small class="text-muted">Penulis Buku</small>
                        </div>

                        <div class="form-group">
                            <label for="nomor_peminjaman" class="form-label required">Penerbit</label>
                            <input type="text" class="form-control" value="{{ $book->publisher }}" readonly>
                            <input type="hidden" name="buku_id" value="{{ $book->id }}">
                            <small class="text-muted">Penerbit Buku</small>
                        </div>

                        <!-- User / Peminjam -->
                        <div class="form-group">
                            <label class="form-label required">Pengguna / Peminjam</label>

                            <!-- Tampilkan nama user login -->
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            <!-- Kirim user_id ke database -->
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <small class="text-muted">
                                Peminjaman dilakukan oleh akun yang sedang login
                            </small>
                        </div>

                        <!-- Buku -->
                        {{-- <div class="form-group">
                            <label for="buku_id" class="form-label required">Buku</label>
                            <select class="form-select form-control" id="buku_id" name="buku_id" required>
                                <option value="">-- Pilih Buku --</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>

                                @endforeach

                            </select>
                            <small class="text-muted">Pilih buku yang akan dipinjam</small>
                        </div> --}}

                        <!-- Tanggal Peminjaman -->
                        <div class="form-group">
                            <label for="tanggal_peminjaman" class="form-label required">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman"
                                required>
                        </div>

                        <!-- Tanggal Pengembalian -->
                        <div class="form-group">
                            <label for="tanggal_pengembalian" class="form-label required">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tanggal_pengembalian"
                                name="tanggal_pengembalian" required>
                            <small class="text-muted">Tanggal paling lambat untuk pengembalian buku</small>
                        </div>

                        <!-- Status Peminjaman -->
                        {{-- <div class="form-group">
                            <label for="status_peminjaman" class="form-label required">Status Peminjaman</label>
                            <select class="form-select form-control" id="status_peminjaman" name="status_peminjaman"
                                required>
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif">Aktif</option>
                                <option value="pending">Pending</option>
                                <option value="dikembalikan">Dikembalikan</option>
                                <option value="hilang">Hilang</option>
                                <option value="rusak">Rusak</option>
                            </select>
                        </div> --}}

                        <!-- Checkbox Persetujuan -->
                        <div class="checkbox-agreement">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="persetujuan_denda"
                                    name="persetujuan_denda" required>
                                <label class="form-check-label" for="persetujuan_denda">
                                    <strong>Saya siap menerima denda apabila buku hilang atau rusak</strong>
                                </label>
                            </div>
                            <small class="text-muted d-block mt-2">
                                Dengan mencentang kotak ini, Anda menyetujui untuk menanggung biaya penggantian atau
                                perbaikan buku jika buku yang dipinjam mengalami kerusakan atau kehilangan.
                            </small>
                        </div>

                        <!-- Tombol -->
                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary btn-lg me-2">
                                <i class="bi bi-check-circle"></i> Buat Peminjaman
                            </button>
                            <button type="reset" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-clockwise"></i> Reset
                            </button>
                            <a href="#" class="btn btn-danger btn-lg ms-2">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Struk Peminjaman -->
   @if(isset($peminjaman) && $peminjaman)
<div class="modal fade" id="modalStruk" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Pengajuan Peminjaman Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="strukturContent" style="font-family: monospace; font-size:14px;">
                    <div class="text-center">
                        <strong>PERPUSTAKAAN DIGITAL</strong><br>
                        =========================
                    </div>

                    No : {{ $peminjaman->nomor_peminjaman }} <br>
                    Tgl: {{ now()->format('d-m-Y H:i') }}

                    <hr>

                    Buku :
                    {{ $peminjaman->buku->title }} <br>
                    Penulis :
                    {{ $peminjaman->buku->author }}

                    <hr>

                    Peminjam :
                    {{ $peminjaman->user->name }} <br>
                    Status :
                    {{ strtoupper($peminjaman->status) }}

                    <hr>

                    Pinjam :
                    {{ $peminjaman->tanggal_peminjaman }} <br>
                    Kembali :
                    {{ $peminjaman->tanggal_pengembalian }}

                    <hr>
                    <div class="text-center">
                        TERIMA KASIH
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="btnDownload">
                    Download PDF
                </button>

                <button class="btn btn-success" id="btnPrint">
                    Cetak
                </button>

                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endif

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- html2pdf library untuk download PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


@if(session('peminjaman_id'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    var modal = new bootstrap.Modal(document.getElementById('modalStruk'));
    modal.show();
});
</script>
@endif

<script>
document.getElementById("btnPrint").addEventListener("click", function() {
    var printContents = document.getElementById("strukturContent").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
});
</script>

<script>
document.getElementById("btnDownload")?.addEventListener("click", function () {
    const element = document.getElementById("strukturContent");

    html2pdf()
        .set({
            margin: 0.5,
            filename: 'bukti-peminjaman.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        })
        .from(element)
        .save();
});
</script>

<script>
document.getElementById("btnPrint")?.addEventListener("click", function () {
    var printContents = document.getElementById("strukturContent").innerHTML;
    var newWindow = window.open('', '', 'width=800,height=600');
    newWindow.document.write('<html><head><title>Cetak Bukti</title></head><body>');
    newWindow.document.write(printContents);
    newWindow.document.write('</body></html>');
    newWindow.document.close();
    newWindow.print();
});
</script>



</body>

</html>
