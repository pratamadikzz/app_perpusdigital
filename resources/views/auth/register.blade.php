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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .wrapper {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px;
        }

        /* Kiri - Informasi */
        .container-left {
            flex: 1;
            background: #f8f9fa;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .container-left img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-bottom: 30px;
            display: block;
        }

        .title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #033A96;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .content h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .content br {
            display: none;
        }

        /* Kanan - Form */
        .form-regis {
            flex: 1;
            padding: 60px 40px;
            background: white;
            min-width: 400px;
        }

        .form-regis h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #033A96;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-regis input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            outline: none;
        }

        .form-regis input:focus {
            border-color: #033A96;
            box-shadow: 0 0 0 3px rgba(3, 58, 150, 0.1);
        }

        .form-regis input::placeholder {
            color: #adb5bd;
        }

        .form-regis button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #033A96 0%, #022c73 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 10px;
        }

        .form-regis button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(3, 58, 150, 0.3);
        }

        .form-regis button:active {
            transform: translateY(0);
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95rem;
            color: #6c757d;
        }

        .login-link a {
            color: #033A96;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                margin: 10px;
            }

            .container-left {
                padding: 40px 20px;
                text-align: center;
            }

            .container-left img {
                max-width: 300px;
            }

            .title h2 {
                font-size: 2rem;
            }

            .form-regis {
                padding: 40px 20px;
                min-width: auto;
            }

            .form-regis h1 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .container-left {
                padding: 30px 15px;
            }

            .form-regis {
                padding: 30px 15px;
            }

            .title h2 {
                font-size: 1.75rem;
            }

            .form-regis h1 {
                font-size: 1.5rem;
            }

            .content h4 {
                font-size: 1.1rem;
            }

            .content p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-left">
            <img src="{{ asset('img/logo pustakadigital.png') }}" alt="Logo Perpustakaan Digital">
            <div class="title">
                <h2>Jelajahi Beragam Jenis Buku-buku</h2>
            </div>
            <div class="content">
                <h4>Langkah-langkah Mendaftar Akun Peminjam</h4>
                <p>1. Buka website Perpustakaan Digital. Pastikan perangkat terhubung ke internet, lalu akses website
                    perpustakaan digital.</p>
                <p>2. Klik menu "Daftar". Pilih tombol Daftar / Register Peminjam yang tersedia di halaman utama.</p>
                <p>3. Isi formulir pendaftaran. Lengkapi data yang diminta seperti: Nama lengkap, Email, Username / NIS
                    / NIM, Password, Konfirmasi password.</p>
                <p>4. Pastikan data yang diisi benar. Periksa kembali data sebelum melanjutkan agar tidak terjadi
                    kesalahan.</p>
                <p>5. Klik tombol "Daftar". Setelah semua data terisi dengan benar, klik tombol Daftar untuk mengirimkan
                    data.</p>
                <p>6. Pendaftaran berhasil. Jika data valid, sistem akan menampilkan pesan bahwa pendaftaran berhasil.
                </p>
                <p>7. Login ke akun peminjam. Gunakan email/username dan password yang telah didaftarkan untuk masuk ke
                    sistem dan mulai menggunakan layanan perpustakaan digital.</p>
            </div>
        </div>
        <div class="form-regis">
            <h1>Registrasi Akun Peminjam</h1>
            @if ($errors->any())
                <div
                    style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Nama Lengkap" required name="name"
                        value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email Aktif" required name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Username" required name="username" value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Alamat" required name="alamat" value="{{ old('alamat') }}">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password Baru" required name="password">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Konfirmasi Password" required name="password_confirmation">
                </div>
                <button type="submit">Daftar</button>
            </form>
            <div class="login-link">
                Sudah punya akun? <a href="{{ route('auth/login') }}">Login di sini</a>
            </div>
        </div>
    </div>
</body>

</html>
