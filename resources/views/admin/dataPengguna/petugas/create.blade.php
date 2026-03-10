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

        <div class="page-content">
            <div class="content">

                <div class="page-header">
                    <h2>Tambah Petugas</h2>
                </div>

                <form action="{{ url('admin/dataPengguna/petugas/store') }}" method="POST">
                    @csrf

                    <input type="text" name="name" placeholder="Nama" required><br><br>
                    <input type="text" name="username" placeholder="Username" required><br><br>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="text" name="alamat" placeholder="Alamat" required>

                    <select name="role">
                        <option value="petugas">Petugas</option>
                    </select>

                    <button type="submit">Simpan</button>
                </form>

            </div>
        </div>
    </body>
    </html>
