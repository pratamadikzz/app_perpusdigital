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
    <h2>Permintaan Pengembalian Buku</h2>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($pengembalians as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td>{{ $data->user->name }}</td>

                    <td>{{ $data->book->title }}</td>

                    <td>{{ $data->tanggal_peminjaman }}</td>

                    <td>
                        <span style="color:orange;font-weight:bold;">
                            Menunggu
                        </span>
                    </td>

                    <td>

                        @if ($peminjaman->status == 'menunggu')
                            <form action="{{ route('admin.peminjaman.approve', $peminjaman->id) }}" method="POST">
                                @csrf
                                <button>Approve</button>
                            </form>

                            <form action="{{ route('admin.peminjaman.reject', $peminjaman->id) }}" method="POST">
                                @csrf
                                <button>Tolak</button>
                            </form>
                        @endif

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" align="center">
                        Tidak ada pengembalian
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>
</body>

</html>
