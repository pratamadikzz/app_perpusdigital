<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        color: #f4f6fb;
    }

    .wrapper {
        display: flex;
        gap: 50px;
        padding: 20px;
        align-items: center;
    }

    /* kiri */
    .container-left {
        background: white;
        border-radius: 10px;
        width: 500px;
        height: 900px;
        margin-top: 100px;
        margin-left: 100px;
        box-shadow: 0 5px 15px 2px rgba(0, 0, 0, 0.274);
        font-family: 'Open Sans', sans-serif;
        position: relative;
    }

    .title {
        margin-top: 90px;
        margin-left: 50px;
        color: #033A96;
    }

    .content {
        margin-top: 50px;
        color: rgba(62, 66, 79, 0.619);
        line-height: 30px;
        width: 400px;
        margin-left: 40px;
        text-align: justify;
    }

    .form-regis form {
        display: inline-block;
    }

    /* KANAN (FORM) */
    .form-regis {
        background: white;
        width: 400px;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.644);
    }

    .form-regis h1 {
        color: #033A96;
        margin-bottom: 30px;
        font-family: "Open Sans", sans-serif;
    }

    /* INPUT */
    .form-regis input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
        outline: none;
    }

    .form-regis input:focus {
        border-color: #033A96;
    }

    /* BUTTON */
    .form-regis button {
        width: 100%;
        padding: 12px;
        background: #033A96;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .form-regis button:hover {
        background: #022c73;
    }
</style>

<body>
    <div class="wrapper">
        <div class="container-left">
            <img src="{{ asset('img/logo pustakadigital.png') }}" alt=""
                style="width: 500px; heigth: 500px; position: absolute; margin-top:-100px; margin-left:20px;">
            <div class="title">
                <h2>Jelajahi Beragam Jenis Buku-buku </h2>
            </div>
            <hr style="margin-top: 50px;">
            <div class="content">
                <h4>Langkah-langkah Mendaftar Akun Peminjam</h4>
                <p>1. Buka website Perpustakaan Digital
                    Pastikan perangkat terhubung ke internet, lalu akses website perpustakaan digital.
                    <br>
                    2. Klik menu “Daftar”
                    Pilih tombol Daftar / Register Peminjam yang tersedia di halaman utama.
                    <br>
                    3. Isi formulir pendaftaran
                    Lengkapi data yang diminta seperti:

                    Nama lengkap

                    Email

                    Username / NIS / NIM

                    Password

                    Konfirmasi password
                    <br>
                    4. Pastikan data yang diisi benar
                    Periksa kembali data sebelum melanjutkan agar tidak terjadi kesalahan.
                    <br>
                    5. Klik tombol “Daftar”
                    Setelah semua data terisi dengan benar, klik tombol Daftar untuk mengirimkan data.
                    <br>
                    6. Pendaftaran berhasil
                    Jika data valid, sistem akan menampilkan pesan bahwa pendaftaran berhasil.
                    <br>
                    7. Login ke akun peminjam
                    Gunakan email/username dan password yang telah didaftarkan untuk masuk ke sistem dan mulai
                    menggunakan
                    layanan perpustakaan digital.
                </p>
            </div>
        </div>
        <div class="form-regis">
            <h1>Registrasi Akun Peminjam</h1>
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <input type="text" placeholder="Nama Lengkap" required>
                <input type="email" placeholder="Email Aktif" required>
                <input type="text" placeholder="Username" required>
                <input type="text" placeholder="Alamat" required>
                <input type="password" placeholder="Password Baru" required>
                <input type="password" placeholder="Konfirmasi Password" required>
                <button type="submit">Daftar</button>
            </form>
        </div>
    </div>
</body>

</html>
