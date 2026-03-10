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


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor</th>
                <th>User</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nomor_peminjaman }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->buku->title }}</td>
                    <td>
                        @if ($item->status == 'pending')
                            <span class=" bg-warning">Pending</span>
                        @elseif($item->status == 'aktif')
                            <span class="bg-success">Aktif</span>
                        @elseif($item->status == 'ditolak')
                            <span class="bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 'pending')
                            <form action="{{ route('admin.peminjaman.approve', $item->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Approve</button>
                            </form>

                            <form action="{{ route('admin.peminjaman.reject', $item->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
