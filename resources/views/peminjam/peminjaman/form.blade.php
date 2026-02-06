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

                    <form action="#" method="POST">
                        @csrf

                        <!-- Nomor Peminjaman -->
                        <div class="form-group">
                            <label for="nomor_peminjaman" class="form-label required">Nomor Peminjaman</label>
                            <input type="text" class="form-control" id="nomor_peminjaman" name="nomor_peminjaman"
                                placeholder="Auto Generated" readonly>
                            <small class="text-muted">Nomor ini akan di-generate secara otomatis</small>
                        </div>

                        <!-- User / Peminjam -->
                        <div class="form-group">
                            <label for="user_id" class="form-label required">Pengguna / Peminjam</label>
                            <select class="form-select form-control" id="user_id" name="user_id" required>
                                <option value="">-- Pilih Pengguna --</option>
                                <option value="1">John Doe</option>
                                <option value="2">Jane Smith</option>
                                <option value="3">Ahmad Rifki</option>
                            </select>
                            <small class="text-muted">Pilih pengguna yang akan meminjam buku</small>
                        </div>

                        <!-- Buku -->
                        <div class="form-group">
                            <label for="buku_id" class="form-label required">Buku</label>
                            <select class="form-select form-control" id="buku_id" name="buku_id" required>
                                <option value="">-- Pilih Buku --</option>
                                <option value="1">Laravel - The PHP Framework for Web Artisans</option>
                                <option value="2">Design Patterns in PHP</option>
                                <option value="3">Clean Code: A Handbook of Agile Software Craftsmanship</option>
                                <option value="4">The Pragmatic Programmer</option>
                            </select>
                            <small class="text-muted">Pilih buku yang akan dipinjam</small>
                        </div>

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
                        <div class="form-group">
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
                        </div>

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
    <div class="modal fade" id="modalStruk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Struk Peminjaman Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="strukturContent" class="struk-container">
                        <!-- Struk akan di-generate di sini -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnDownloadPDF">
                        <i class="bi bi-download"></i> Download PDF
                    </button>
                    <button type="button" class="btn btn-info" id="btnPrint">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- html2pdf library untuk download PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        // Generate nomor peminjaman otomatis
        function generateNomorPeminjaman() {
            const datePart = new Date().toISOString().slice(0, 10).replace(/-/g, '');
            const randomPart = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
            return `PJ-${datePart}-${randomPart}`;
        }

        // Set tanggal peminjaman ke hari ini secara otomatis
        document.getElementById('tanggal_peminjaman').valueAsDate = new Date();

        // Generate nomor peminjaman
        document.getElementById('nomor_peminjaman').value = generateNomorPeminjaman();

        // Set tanggal pengembalian default (7 hari dari peminjaman)
        document.getElementById('tanggal_peminjaman').addEventListener('change', function() {
            let tanggalPeminjaman = new Date(this.value);
            let tanggalPengembalian = new Date(tanggalPeminjaman);
            tanggalPengembalian.setDate(tanggalPengembalian.getDate() + 7);
            document.getElementById('tanggal_pengembalian').valueAsDate = tanggalPengembalian;
        });

        // Fungsi untuk format tanggal Indonesia
        function formatTanggalIndonesia(dateString) {
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const date = new Date(dateString + 'T00:00:00');
            return date.toLocaleDateString('id-ID', options);
        }

        // Fungsi untuk generate struk peminjaman
        function generateStrukPeminjaman() {
            const nomorPeminjaman = document.getElementById('nomor_peminjaman').value;
            const userIdSelect = document.getElementById('user_id');
            const bukuIdSelect = document.getElementById('buku_id');
            const tanggalPeminjaman = document.getElementById('tanggal_peminjaman').value;
            const tanggalPengembalian = document.getElementById('tanggal_pengembalian').value;
            const statusPeminjaman = document.getElementById('status_peminjaman').value;

            const userName = userIdSelect.options[userIdSelect.selectedIndex].text;
            const bukuName = bukuIdSelect.options[bukuIdSelect.selectedIndex].text;

            const tanggalSekarang = new Date().toLocaleDateString('id-ID', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            const strukHTML = `
                <div class="struk-header">
                    <div class="struk-title">PERPUSTAKAAN DIGITAL</div>
                    <div class="struk-subtitle">Struk Peminjaman Buku</div>
                </div>

                <div class="struk-body">
                    <div class="struk-row">
                        <span class="struk-label">Nomor Peminjaman:</span>
                        <span class="struk-value"><strong>${nomorPeminjaman}</strong></span>
                    </div>

                    <div class="struk-divider"></div>

                    <div class="struk-row">
                        <span class="struk-label">Tanggal:</span>
                        <span class="struk-value">${tanggalSekarang}</span>
                    </div>

                    <div class="struk-divider"></div>

                    <div class="struk-row">
                        <span class="struk-label">Peminjam:</span>
                        <span class="struk-value">${userName}</span>
                    </div>

                    <div class="struk-row">
                        <span class="struk-label">Judul Buku:</span>
                        <span class="struk-value">${bukuName}</span>
                    </div>

                    <div class="struk-divider"></div>

                    <div class="struk-row">
                        <span class="struk-label">Tgl. Peminjaman:</span>
                        <span class="struk-value">${formatTanggalIndonesia(tanggalPeminjaman)}</span>
                    </div>

                    <div class="struk-row">
                        <span class="struk-label">Tgl. Pengembalian:</span>
                        <span class="struk-value">${formatTanggalIndonesia(tanggalPengembalian)}</span>
                    </div>

                    <div class="struk-row">
                        <span class="struk-label">Status:</span>
                        <span class="struk-value"><strong>${statusPeminjaman.toUpperCase()}</strong></span>
                    </div>

                    <div class="struk-divider"></div>

                    <div class="struk-row">
                        <span class="struk-label">Persetujuan:</span>
                        <span class="struk-value">✓ Diterima</span>
                    </div>
                </div>

                <div class="struk-footer">
                    <p>Terima kasih telah menggunakan layanan kami</p>
                    <p>Harap kembalikan buku tepat pada waktunya</p>
                    <p style="margin-top: 20px; border-top: 1px solid #ccc; padding-top: 10px;">
                        Struk ini merupakan bukti peminjaman yang sah
                    </p>
                </div>
            `;

            return strukHTML;
        }

        // Handle form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validasi checkbox
            if (!document.getElementById('persetujuan_denda').checked) {
                alert('Anda harus menyetujui pernyataan denda untuk melanjutkan');
                return false;
            }

            // Generate dan tampilkan struk di modal
            const strukHTML = generateStrukPeminjaman();
            document.getElementById('strukturContent').innerHTML = strukHTML;

            // Tampilkan modal
            const modal = new bootstrap.Modal(document.getElementById('modalStruk'));
            modal.show();
        });

        // Download PDF
        document.getElementById('btnDownloadPDF').addEventListener('click', function() {
            const element = document.getElementById('strukturContent');
            const nomorPeminjaman = document.getElementById('nomor_peminjaman').value;

            const opt = {
                margin: 10,
                filename: `Struk_Peminjaman_${nomorPeminjaman}.pdf`,
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                }
            };

            html2pdf().set(opt).from(element).save();
        });

        // Print struk
        document.getElementById('btnPrint').addEventListener('click', function() {
            const element = document.getElementById('strukturContent');
            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Cetak Struk Peminjaman</title>');
            printWindow.document.write(
                '<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">'
                );
            printWindow.document.write('<style>');
            printWindow.document.write(`
                body {
                    padding: 20px;
                    font-family: 'Courier New', monospace;
                }
                .struk-container {
                    background-color: white;
                    padding: 20px;
                    max-width: 600px;
                    margin: 0 auto;
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
            `);
            printWindow.document.write('</style></head><body>');
            printWindow.document.write(element.innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</body>

</html>
