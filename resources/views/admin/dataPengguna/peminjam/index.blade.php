<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjam</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .page-content {
            margin-left: 10px;
        }

        .content {
            padding: 30px;
            background: #f8fafc;
            min-height: 10vh;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-header h2 {
            margin: 0;
            color: #0f172a;
        }

        .btn-add {
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

        /* Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
        }

        /* Search */
        .table-tools {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .table-tools input {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            outline: none;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table th,
        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        table th {
            background: #f1f5f9;
            color: #475569;
        }

        table tr:hover {
            background: #f9fafb;
        }

        .btn-edit,
        .btn-delete {
            color: inherit;
            /* ambil warna yang sudah ditentukan */
            margin-right: 8px;
            text-decoration: none;
            /* hilangkan garis bawah */
            font-size: 16px;
            transition: color 0.2s;
        }

        /* Button action */
        .btn-edit:hover {
            color: #2563eb;
        }

        .btn-delete:hover {
            color: #ef4444;
        }
    </style>
</head>

<body>

    @include('components.sidebar')
    @include('components.navbar')

    <div class="page-content">
        <div class="content">

            <div class="page-header">
                <h2>Data Peminjam</h2>
                <a href="{{ route('laporan.peminjam') }}" target="_blank" class="btn-add" style="background:#16a34a;">
                    <i class="fa-solid fa-file-pdf"></i> Cetak Laporan PDF
                </a>
            </div>

            <div class="card">

                {{-- <form action="" method="GET">
                    <input type="text" name="search" placeholder="Cari peminjam..." id="searchInput">
                    <button type="button" id="resetSearch">Reset</button>
                </form> --}}

                <table id="usersTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>Password Terenskripsi</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>
                                    <form action="{{ url('admin/peminjam/delete/'.$user->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fa-solid fa-trash-can-arrow-up"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#usersTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                language: {
                    search: "cari: ",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });

            $('#searchInput').on('keyup', function(){
                table.search(this.value).draw();
            });

            $('#resetSearch').on('click', function(){
                $('#searchInput').val('');
                table.search('').draw();
            });

            table.on('order.dt search.dt', function(){
                table.column(0, {search:'applied', order:'applied'})
                .nodes()
                .each(function(cell, i){
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>


</body>

</html>
