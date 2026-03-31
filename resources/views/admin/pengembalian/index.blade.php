<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <div style="display:flex; justify-content:space-between; align-items:center; padding:15px 20px;">
        <h2 style="margin:0;">Permintaan Pengembalian Buku</h2>
        <a href="{{ route('laporan.pengembalian') }}" target="_blank"
            style="background:#16a34a; color:white; padding:8px 14px; border-radius:6px; text-decoration:none; font-size:14px;">
            <i class="fa-solid fa-file-pdf"></i> Cetak Laporan PDF
        </a>
    </div>

    @if ($pengembalianMenunggu->isEmpty() && $pengembalianDitolakMenunggu->isEmpty() && $riwayatSelesai->isEmpty())
        <p style="text-align: center; padding: 40px; color: #999;">
            <i class="fa-solid fa-inbox" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
            Tidak ada riwayat pengembalian buku
        </p>
    @else
        <!-- SECTION 1: PENGEMBALIAN NORMAL -->
        @if (!$pengembalianMenunggu->isEmpty())
            <div style="margin: 20px;">
                <h3
                    style="font-size: 18px; color: #333; margin-bottom: 16px; border-bottom: 2px solid #3b82f6; padding-bottom: 8px;">
                    <i class="fa-solid fa-box-open"></i> Pengembalian Buku (Menunggu Approval)
                </h3>
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
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
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_peminjaman)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_pengembalian)->format('d M Y') }}</td>
                                <td>
                                    <span style="color:orange;font-weight:bold;">
                                        Menunggu Konfirmasi
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.pengembalian.approve', $data->id) }}" method="POST">
                                        @csrf
                                        <button
                                            style="background: #10b981; color: white; padding: 6px 12px; border: none; border-radius: 6px; cursor: pointer;">
                                            Approve
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- SECTION 2: PENOLAKAN MENUNGGU PERTANGGUNG JAWABAN -->
        @if (!$pengembalianDitolakMenunggu->isEmpty())
            <div style="margin: 20px;">
                <h3
                    style="font-size: 18px; color: #333; margin-bottom: 16px; border-bottom: 2px solid #dc2626; padding-bottom: 8px;">
                    <i class="fa-solid fa-ban"></i> Penolakan Buku (Menunggu Pertanggung Jawaban)
                </h3>
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
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
                                    <span style="color:orange;font-weight:bold;">
                                        Menunggu Tunas
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.pengembalian.approve', $data->id) }}" method="POST">
                                        @csrf
                                        <button
                                            style="background: #10b981; color: white; padding: 6px 12px; border: none; border-radius: 6px; cursor: pointer;"
                                            title="Selesaikan penolakan setelah peminjam bertanggung jawab">
                                            Selesai
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
            <div style="margin: 20px;">
                <h3
                    style="font-size: 18px; color: #333; margin-bottom: 16px; border-bottom: 2px solid #10b981; padding-bottom: 8px;">
                    <i class="fa-solid fa-check-circle"></i> Riwayat Pengembalian Selesai
                </h3>
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
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
</body>

</html>
