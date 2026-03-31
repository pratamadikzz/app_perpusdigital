<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengembalian Buku - Petugas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .wrapper {
            display: flex;
        }

        .content-wrapper {
            flex: 1;
            margin-left: 50px;
        }

        .main-content {
            padding: 20px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-section h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }

        .btn-export {
            background: #16a34a;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .btn-export:hover {
            background: #15803d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: #f3f4f6;
            border-bottom: 2px solid #e5e7eb;
        }

        th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #b45309;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-approve,
        .btn-reject {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-approve {
            background: #10b981;
            color: white;
        }

        .btn-approve:hover {
            background: #059669;
        }

        .btn-reject {
            background: #ef4444;
            color: white;
        }

        .btn-reject:hover {
            background: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 8px;
            color: #999;
            font-size: 16px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: white;
            margin: 10% auto;
            padding: 30px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .modal-content h3 {
            margin-bottom: 20px;
            color: #333;
            font-size: 18px;
        }

        .modal-content select,
        .modal-content input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        .modal-content button {
            background: #3b82f6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
            width: 100%;
        }

        .modal-content button:hover {
            background: #2563eb;
        }

        #infoDenda {
            padding: 12px;
            background: #fef3c7;
            border-radius: 6px;
            margin-bottom: 15px;
            color: #b45309;
            font-weight: 600;
            min-height: 20px;
        }

        .close-modal {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: #999;
        }

        .close-modal:hover {
            color: #333;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d1fae5;
            color: #047857;
            border: 1px solid #86efac;
        }

        .alert-error {
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fca5a5;
        }
    </style>
</head>

<body>
    @include('petugas.dataBuku.components.sidebar')
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content-wrapper">
            <div class="main-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                <div class="header-section">
                    <h2><i class="fas fa-undo-alt"></i> Permintaan Pengembalian Buku</h2>
                    <a href="{{ route('laporan.pengembalian') }}" target="_blank" class="btn-export">
                        <i class="fas fa-file-pdf"></i> Cetak Laporan PDF
                    </a>
                </div>

                @if ($pengembalianMenunggu->isEmpty() && $pengembalianDitolakMenunggu->isEmpty() && $riwayatSelesai->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-inbox"
                            style="font-size: 48px; color: #ddd; margin-bottom: 10px; display: block;"></i>
                        Tidak ada riwayat pengembalian buku
                    </div>
                @else
                    <!-- SECTION 1: PENGEMBALIAN NORMAL MENUNGGU APPROVAL -->
                    @if (!$pengembalianMenunggu->isEmpty())
                        <div style="margin-bottom: 40px;">
                            <h3
                                style="font-size: 18px; color: #333; margin-bottom: 16px; border-bottom: 2px solid #3b82f6; padding-bottom: 8px;">
                                <i class="fas fa-box-open"></i> Pengembalian Buku (Menunggu Approval)
                            </h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengembalianMenunggu as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <strong>{{ $data->user->name }}</strong><br>
                                                <small style="color: #999;">{{ $data->user->email ?? '-' }}</small>
                                            </td>
                                            <td>{{ $data->book->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tanggal_peminjaman)->format('d M Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($data->tanggal_pengembalian)->format('d M Y') }}
                                            </td>
                                            <td>
                                                <span class="status-badge status-menunggu">
                                                    <i class="fas fa-clock"></i> Menunggu Konfirmasi
                                                </span>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <form
                                                        action="{{ route('petugas.pengembalian.approve', $data->id) }}"
                                                        method="POST" style="flex: 1;">
                                                        @csrf
                                                        <button type="submit" class="btn-approve">
                                                            <i class="fas fa-check"></i> Approve
                                                        </button>
                                                    </form>
                                                    <button class="btn-reject"
                                                        onclick="openModal({{ $data->id }})">
                                                        <i class="fas fa-times"></i> Tolak
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- SECTION 2: PENOLAKAN MENUNGGU PERTANGGUNG JAWABAN -->
                    @if (!$pengembalianDitolakMenunggu->isEmpty())
                        <div style="margin-bottom: 40px;">
                            <h3
                                style="font-size: 18px; color: #333; margin-bottom: 16px; border-bottom: 2px solid #dc2626; padding-bottom: 8px;">
                                <i class="fas fa-ban"></i> Penolakan Buku (Menunggu Pertanggung Jawaban)
                            </h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Judul Buku</th>
                                        <th>Alasan</th>
                                        <th>Denda</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengembalianDitolakMenunggu as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <strong>{{ $data->user->name }}</strong><br>
                                                <small style="color: #999;">{{ $data->user->email ?? '-' }}</small>
                                            </td>
                                            <td>{{ $data->book->title }}</td>
                                            <td>
                                                @if ($data->alasan_penolakan == 'hilang')
                                                    <span
                                                        style="background: #fecaca; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #991b1b;">
                                                        Buku Hilang
                                                    </span>
                                                @elseif ($data->alasan_penolakan == 'rusak')
                                                    <span
                                                        style="background: #fed7aa; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #92400e;">
                                                        Buku Rusak
                                                    </span>
                                                @elseif ($data->alasan_penolakan == 'terlambat')
                                                    <span
                                                        style="background: #fef08a; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #713f12;">
                                                        Terlambat
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong style="color: #dc2626;">
                                                    Rp {{ number_format($data->denda, 0, ',', '.') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="status-badge status-menunggu">
                                                    <i class="fas fa-hourglass-half"></i> Menunggu Tunas
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('petugas.pengembalian.approve', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn-approve"
                                                        title="Selesaikan penolakan setelah peminjam bertanggung jawab">
                                                        <i class="fas fa-check-double"></i> Selesai
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- SECTION 3: RIWAYAT SELESAI -->
                    @if (!$riwayatSelesai->isEmpty())
                        <div style="margin-bottom: 40px;">
                            <h3
                                style="font-size: 18px; color: #333; margin-bottom: 16px; border-bottom: 2px solid #10b981; padding-bottom: 8px;">
                                <i class="fas fa-check-circle"></i> Riwayat Pengembalian Selesai
                            </h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Judul Buku</th>
                                        <th>Alasan/Status</th>
                                        <th>Denda</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayatSelesai as $key => $data)
                                        <tr style="background: #f0fdf4;">
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <strong>{{ $data->user->name }}</strong><br>
                                                <small style="color: #999;">{{ $data->user->email ?? '-' }}</small>
                                            </td>
                                            <td>{{ $data->book->title }}</td>
                                            <td>
                                                @if ($data->alasan_penolakan)
                                                    @if ($data->alasan_penolakan == 'hilang')
                                                        <span
                                                            style="background: #fecaca; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #991b1b;">
                                                            Buku Hilang
                                                        </span>
                                                    @elseif ($data->alasan_penolakan == 'rusak')
                                                        <span
                                                            style="background: #fed7aa; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #92400e;">
                                                            Buku Rusak
                                                        </span>
                                                    @elseif ($data->alasan_penolakan == 'terlambat')
                                                        <span
                                                            style="background: #fef08a; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #713f12;">
                                                            Terlambat
                                                        </span>
                                                    @endif
                                                @else
                                                    <span
                                                        style="background: #dbeafe; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: #0c4a6e;">
                                                        Normal OK
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->denda && $data->denda > 0)
                                                    <strong style="color: #dc2626;">
                                                        Rp {{ number_format($data->denda, 0, ',', '.') }}
                                                    </strong>
                                                @else
                                                    <span style="color: #999;">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($data->updated_at)->format('d M Y H:i') }}
                                            </td>
                                            <td>
                                                @if ($data->status == 'dikembalikan')
                                                    Pengembalian diterima
                                                @elseif ($data->status == 'selesai')
                                                    Penolakan diselesaikan
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- MODAL TOLAK -->
        <div id="modalTolak" class="modal">
            <div class="modal-content">
                <span class="close-modal" onclick="closeModal()">&times;</span>
                <form id="formTolak" method="POST" onsubmit="return validateForm()">
                    @csrf

                    <h3>Alasan Penolakan</h3>

                    <select name="alasan" id="alasanSelect" onchange="setDenda(this.value)" required>
                        <option value="">-- Pilih Alasan --</option>
                        <option value="hilang">Buku Hilang</option>
                        <option value="rusak">Buku Rusak</option>
                        <option value="terlambat">Terlambat</option>
                    </select>

                    <input type="hidden" name="denda" id="denda" value="0">

                    <div id="infoDenda" style="display: none;"></div>

                    <button type="submit" id="submitBtn" disabled>Kirim Penolakan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('modalTolak').style.display = 'block'
            document.getElementById('formTolak').action = "/petugas/pengembalian/tolak/" + id
            // Reset form
            document.getElementById('alasanSelect').value = ''
            document.getElementById('denda').value = '0'
            document.getElementById('infoDenda').innerHTML = ''
            document.getElementById('infoDenda').style.display = 'none'
            document.getElementById('submitBtn').disabled = true
        }

        function closeModal() {
            document.getElementById('modalTolak').style.display = 'none'
        }

        window.onclick = function(event) {
            const modal = document.getElementById('modalTolak');
            if (event.target == modal) {
                modal.style.display = 'none'
            }
        }

        function setDenda(alasan) {
            let denda = 0
            let submitBtn = document.getElementById('submitBtn')

            if (alasan == "hilang") {
                denda = 100000
            } else if (alasan == "rusak") {
                denda = 50000
            } else if (alasan == "terlambat") {
                denda = 10000
            }

            document.getElementById('denda').value = denda

            if (denda > 0) {
                document.getElementById('infoDenda').innerHTML =
                    "<strong>⚠️ Denda yang dikenakan:</strong> Rp " + denda.toLocaleString('id-ID')
                document.getElementById('infoDenda').style.display = 'block'
                submitBtn.disabled = false
            } else {
                document.getElementById('infoDenda').innerHTML = ""
                document.getElementById('infoDenda').style.display = 'none'
                submitBtn.disabled = true
            }
        }

        function validateForm() {
            const alasan = document.getElementById('alasanSelect').value
            const denda = document.getElementById('denda').value

            if (!alasan) {
                alert('Silakan pilih alasan penolakan terlebih dahulu')
                return false
            }

            if (!denda || parseInt(denda) === 0) {
                alert('Denda belum ditentukan. Silakan pilih alasan yang valid.')
                return false
            }

            return true
        }
    </script>
</body>

</html>
