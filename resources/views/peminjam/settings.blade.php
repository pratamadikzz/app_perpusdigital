<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan Profil - PustakaDigital</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
            color: #1b2741;
            min-height: 100vh;
        }

        .page-header {
            max-width: 1100px;
            margin: 30px auto 0;
            padding: 0 20px;
        }

        .content-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 14px 40px rgba(25, 33, 61, 0.08);
            padding: 32px;
            max-width: 900px;
            margin: 24px auto 40px;
        }

        .content-card h1 {
            margin-bottom: 8px;
            font-size: 28px;
        }

        .content-card p {
            margin-bottom: 24px;
            color: #596275;
        }

        .form-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: 1fr 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: #22303d;
        }

        .form-group input,
        .form-group textarea {
            border: 1px solid #d9dde6;
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 15px;
            background: #f9fbff;
            color: #121c2b;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            grid-column: span 2;
        }

        .form-actions {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-primary {
            background: #0f5cc1;
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-secondary {
            background: transparent;
            border: 1px solid #c2c9d9;
            color: #1b2741;
            padding: 12px 24px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
        }

        .alert {
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 24px;
            font-size: 14px;
        }

        .alert-success {
            background: #e6f3ff;
            color: #0d4f9d;
            border: 1px solid #b4d3ff;
        }

        .alert-error {
            background: #ffe8e8;
            color: #9b1d23;
            border: 1px solid #f2b8bd;
        }

        .errors {
            margin-top: -10px;
            color: #9b1d23;
            font-size: 14px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
            color: #0f5cc1;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .form-grid,
            textarea {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>
    @include('partials.navbar')

    <main class="page-header">
        <div class="content-card">
            <h1>Pengaturan Profil</h1>
            <p>Perbarui informasi akun Anda dan ubah kata sandi jika diperlukan.</p>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('peminjam.settings.update') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" required>{{ old('alamat', $user->alamat) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi Baru</label>
                        <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi baru">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('peminjam.index') }}" class="btn-secondary">Kembali ke Buku</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
