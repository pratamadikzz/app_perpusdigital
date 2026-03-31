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
    <title>Login - PustakaDigital</title>

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
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.72);
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
            z-index: 50;
        }

        nav .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        nav .logo img {
            height: 42px;
            width: auto;
        }

        nav .logo span {
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 0.02em;
            color: var(--primary);
        }

        nav ul {
            display: flex;
            gap: 24px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav ul li a {
            text-decoration: none;
            padding: 10px 0;
            font-weight: 600;
            color: var(--text);
            transition: color var(--transition);
        }

        nav ul li a:hover {
            color: var(--primary);
        }

        /* Hero */
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 64px 32px;
        }

        .login-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 40px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(226, 232, 240, 0.8);
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            font-size: 2rem;
            margin: 0 0 8px;
            color: var(--primary);
        }

        .login-header p {
            margin: 0;
            color: var(--muted);
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 1rem;
            transition: border-color var(--transition), box-shadow var(--transition);
            background: var(--surface);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-group .icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 1.1rem;
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
            font-size: 1.1rem;
            transition: color var(--transition);
        }

        .form-group .eye-btn:hover {
            color: var(--primary);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 0.9rem;
        }

        .form-options label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            cursor: pointer;
        }

        .form-options input[type="checkbox"] {
            accent-color: var(--primary);
        }

        .form-options a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .form-options a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform var(--transition), box-shadow var(--transition);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.9rem;
            color: var(--muted);
        }

        .login-footer a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Error Notification */
        .error-notification {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            border: 1px solid #fca5a5;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
        }

        .error-notification .icon {
            color: #dc2626;
            font-size: 1.2rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .error-notification .content {
            flex: 1;
        }

        .error-notification .title {
            font-weight: 600;
            color: #dc2626;
            margin-bottom: 4px;
            font-size: 0.95rem;
        }

        .error-notification .message {
            color: #991b1b;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .error-notification .close-btn {
            background: none;
            border: none;
            color: #dc2626;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0;
            margin-left: 8px;
            opacity: 0.7;
            transition: opacity var(--transition);
            flex-shrink: 0;
        }

        .error-notification .close-btn:hover {
            opacity: 1;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Success Notification */
        .success-notification {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: 1px solid #6ee7b7;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
        }

        .success-notification .icon {
            color: #059669;
            font-size: 1.2rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .success-notification .content {
            flex: 1;
        }

        .success-notification .title {
            font-weight: 600;
            color: #059669;
            margin-bottom: 4px;
            font-size: 0.95rem;
        }

        .success-notification .message {
            color: #065f46;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .success-notification .close-btn {
            background: none;
            border: none;
            color: #059669;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0;
            margin-left: 8px;
            opacity: 0.7;
            transition: opacity var(--transition);
            flex-shrink: 0;
        }

        .success-notification .close-btn:hover {
            opacity: 1;
        }

        /* Form validation errors */
        .form-group.error input {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-group .error-message {
            color: #dc2626;
            font-size: 0.8rem;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-group .error-message i {
            font-size: 0.7rem;
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 20px 32px;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Responsive */
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

            .form-group input {
                padding: 12px 14px 12px 44px;
            }

            .form-group .icon {
                left: 12px;
            }

            .form-group .eye-btn {
                right: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="hero">
        <div class="login-card">
            <div class="login-header">
                <h1>Selamat Datang</h1>
                <p>Silakan login untuk melanjutkan ke perpustakaan digital</p>
            </div>

            {{-- Error Notifications --}}
            @if ($errors->any())
                <div class="error-notification">
                    <i class="fa fa-exclamation-triangle icon"></i>
                    <div class="content">
                        <div class="title">Login Gagal</div>
                        <div class="message">
                            @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @elseif($errors->has('password'))
                                {{ $errors->first('password') }}
                            @else
                                Email atau password yang Anda masukkan salah. Silakan coba lagi.
                            @endif
                        </div>
                    </div>
                    <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            @endif

            {{-- Success Notification --}}
            @if (session('success'))
                <div class="success-notification">
                    <i class="fa fa-check-circle icon"></i>
                    <div class="content">
                        <div class="title">Berhasil</div>
                        <div class="message">{{ session('success') }}</div>
                    </div>
                    <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            @endif

            {{-- Status Messages --}}
            @if (session('error'))
                <div class="error-notification">
                    <i class="fa fa-exclamation-triangle icon"></i>
                    <div class="content">
                        <div class="title">Error</div>
                        <div class="message">{{ session('error') }}</div>
                    </div>
                    <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" autocomplete="off">
                @csrf

                <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="error-message">
                            <i class="fa fa-exclamation-circle"></i>
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'error' : '' }}">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="button" class="eye-btn" onclick="togglePassword()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </button>
                    @if ($errors->has('password'))
                        <div class="error-message">
                            <i class="fa fa-exclamation-circle"></i>
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-options">
                    <label>
                        <input type="checkbox" name="remember">
                        Ingat saya
                    </label>
                    <a href="#">Lupa password?</a>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <div class="login-footer">
                Belum punya akun? <a href="{{ route('auth/register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 PustakaDigital.</p>
    </footer>

    <script>
        function togglePassword() {
            event.preventDefault(); // Prevent form submission
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

        // Auto-hide notifications after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.error-notification, .success-notification');

            notifications.forEach(notification => {
                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        notification.style.display = 'none';
                    }, 300);
                }, 5000);
            });

            // Add shake animation for error inputs
            const errorInputs = document.querySelectorAll('.form-group.error input');
            errorInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.remove('error');
                    const errorMessage = this.parentElement.querySelector('.error-message');
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                });
            });
        });

        // Shake animation for error inputs
        function shakeElement(element) {
            element.style.animation = 'shake 0.5s ease-in-out';
            setTimeout(() => {
                element.style.animation = '';
            }, 500);
        }

        // Add shake animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>
