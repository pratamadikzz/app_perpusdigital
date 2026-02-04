<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>

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
                <h2>Data Petugas</h2>
                <a href="#" class="btn-add">
                    <i class="fa-solid fa-circle-plus"></i> Tambah Petugas
                </a>
            </div>

            <div class="card">

                <div class="table-tools">
                    <input type="text" placeholder="Cari petugas...">
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Andhika</td>
                            <td>dhikaDev</td>
                            <td>andhika@mail.com</td>
                            <td>terenskripsi</td>
                            <td>08123456789</td>
                            <td>Bogor</td>
                            <td>
                                <a href="#" class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="btn-delete">
                                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</body>

</html>
