<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Reset Password - PustakaDigital</title>

    <style>
        :root {
            --primary: #1e40af;
            --secondary: #2563eb;
            --accent: #f59e0b;
            --bg: #f8fafc;
            --surface: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e5e7eb;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            --radius: 16px;
            --transition: 0.25s ease;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #eaf2ff 0%, #f8fafc 50%, #eef2ff 100%);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 32px;
            background: var(--surface);
            box-shadow: var(--shadow);
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 24px;
        }

        .nav-links a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: color var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        /* HERO */
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 32px;
        }

        .login-card {
            background: var(--surface);
            padding: 48px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--text);
            margin: 0 0 8px 0;
        }

        .login-header p {
            color: var(--muted);
            margin: 0;
            font-size: 0.95rem;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 1rem;
            transition: all var(--transition);
            background: var(--bg);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        .form-group .icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 1rem;
        }

        .form-group input {
            padding-left: 44px;
        }

        .form-group .eye-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--muted);
            cursor: pointer;
            font-size: 1rem;
            transition: color var(--transition);
        }

        .form-group .eye-btn:hover {
            color: var(--primary);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition);
            margin-bottom: 16px;
        }

        .btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.9rem;
            color: var(--muted);
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* NOTIFICATIONS */
        .notification {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .notification.success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .notification.error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .notification .icon {
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        /* FOOTER */
        footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 20px 32px;
            text-align: center;
            font-size: 0.9rem;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            nav {
                padding: 14px 22px;
            }

            .hero {
                padding: 32px 22px;
            }

            .login-card {
                padding: 32px 24px;
            }

            .login-header h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a href="/" class="logo">PustakaDigital</a>
        <div class="nav-links">
            <a href="/">Beranda</a>
            <a href="/auth/login">Login</a>
        </div>
    </nav>

    <div class="hero">
        <div class="login-card">
            <div class="login-header">
                <h1>Reset Password</h1>
                <p>Masukkan password baru Anda</p>
            </div>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="notification error">
                    <i class="fa fa-exclamation-triangle icon"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" id="password" name="password" placeholder="Password Baru" required>
                    <button type="button" class="eye-btn" onclick="togglePassword()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </button>
                </div>

                <div class="form-group">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>

                <button type="submit" class="btn">Reset Password</button>
            </form>

            <div class="login-footer">
                <a href="{{ route('auth/login') }}">← Kembali ke Login</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 PustakaDigital.</p>
    </footer>

    <script>
        function togglePassword() {
            event.preventDefault();
            const input = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fa fa-eye';
            }
        }
    </script>
</body>
</html>