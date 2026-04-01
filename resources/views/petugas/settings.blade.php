<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaturan Akun - Petugas | PustakaDigital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --bg: #f8fafc;
            --surface: #ffffff;
            --text: #0f172a;
            --text-muted: #64748b;
            --border: #e5e7eb;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --radius: 12px;
            --transition: 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        .content {
            padding: 30px;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        /* Alert Notifications */
        .alert {
            padding: 16px 20px;
            border-radius: var(--radius);
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
        }

        .alert.success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: 1px solid #6ee7b7;
            color: #065f46;
        }

        .alert.error {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            border: 1px solid #fca5a5;
            color: #dc2626;
        }

        .alert .icon {
            font-size: 1.2rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .alert .content {
            flex: 1;
        }

        .alert .title {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .alert .close-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0;
            margin-left: 8px;
            opacity: 0.7;
            transition: opacity var(--transition);
            flex-shrink: 0;
        }

        .alert .close-btn:hover {
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

        /* Settings Card */
        .settings-card {
            background: var(--surface);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-header .icon {
            font-size: 1.5rem;
            opacity: 0.9;
        }

        .card-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }

        .card-body {
            padding: 32px;
        }

        /* Form Groups */
        .form-section {
            margin-bottom: 40px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title .icon {
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            transition: all var(--transition);
            background: var(--surface);
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control.error {
            border-color: var(--error);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .form-help {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .form-error {
            font-size: 0.85rem;
            color: var(--error);
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-error .icon {
            font-size: 0.7rem;
        }

        /* Password Section */
        .password-section {
            background: #f8fafc;
            border-radius: 8px;
            padding: 24px;
            border: 1px solid var(--border);
        }

        .password-note {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 6px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .password-note .icon {
            color: #d97706;
            margin-top: 2px;
        }

        .password-note p {
            margin: 0;
            color: #92400e;
            font-size: 0.9rem;
        }

        /* Action Buttons */
        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            margin-top: 32px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-secondary {
            background: var(--surface);
            color: var(--text);
            border: 2px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--bg);
            border-color: var(--secondary);
        }

        /* Divider */
        .divider {
            height: 1px;
            background: var(--border);
            margin: 32px 0;
            border: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .card-body {
                padding: 24px 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .card-header {
                padding: 20px;
            }

            .card-header h3 {
                font-size: 1.1rem;
            }

            .card-body {
                padding: 20px 16px;
            }
        }
    </style>
</head>

<body>
    @include('petugas.dataBuku.components.sidebar')
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content">
            <div class="container">
                <div class="page-header">
                    <h1><i class="fas fa-cog"></i> Pengaturan Akun</h1>
                    <p>Kelola informasi akun dan keamanan Anda</p>
                </div>

                {{-- Success Alert --}}
                @if (session('success'))
                    <div class="alert success">
                        <i class="fas fa-check-circle icon"></i>
                        <div class="content">
                            <div class="title">Berhasil!</div>
                            <div>{{ session('success') }}</div>
                        </div>
                        <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="alert error">
                        <i class="fas fa-exclamation-triangle icon"></i>
                        <div class="content">
                            <div class="title">Terjadi Kesalahan</div>
                            <div>Silakan perbaiki data yang bermasalah dan coba lagi.</div>
                        </div>
                        <button type="button" class="close-btn" onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <form action="{{ route('petugas.settings.update') }}" method="POST" id="settingsForm">
                    @csrf

                    {{-- Account Information Section --}}
                    <div class="settings-card">
                        <div class="card-header">
                            <i class="fas fa-user icon"></i>
                            <h3>Informasi Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-section">
                                <div class="form-group">
                                    <label class="form-label" for="username">
                                        <i class="fas fa-user-circle"></i> Username
                                    </label>
                                    <input type="text" id="username" name="username"
                                        class="form-control @error('username') error @enderror"
                                        value="{{ old('username', $staff->username) }}" required>
                                    <div class="form-help">Username digunakan untuk login ke sistem</div>
                                    @error('username')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">
                                        <i class="fas fa-envelope"></i> Email
                                    </label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') error @enderror"
                                        value="{{ old('email', $staff->email) }}" required>
                                    <div class="form-help">Email digunakan untuk notifikasi dan recovery akun</div>
                                    @error('email')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Password Change Section --}}
                    <div class="settings-card">
                        <div class="card-header">
                            <i class="fas fa-lock icon"></i>
                            <h3>Keamanan Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="password-section">
                                <div class="password-note">
                                    <i class="fas fa-info-circle icon"></i>
                                    <div>
                                        <strong>Tips Keamanan:</strong> Gunakan kombinasi huruf besar, kecil, angka, dan
                                        simbol.
                                        Minimal 8 karakter.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="current_password">
                                        <i class="fas fa-key"></i> Password Lama
                                    </label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control @error('current_password') error @enderror"
                                        placeholder="Masukkan password saat ini">
                                    <div class="form-help">Diperlukan untuk mengubah password</div>
                                    @error('current_password')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">
                                        <i class="fas fa-lock"></i> Password Baru
                                    </label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') error @enderror"
                                        placeholder="Kosongkan jika tidak ingin mengubah">
                                    <div class="form-help">Minimal 8 karakter dengan kombinasi yang kuat</div>
                                    @error('password')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password_confirmation">
                                        <i class="fas fa-lock"></i> Konfirmasi Password Baru
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') error @enderror"
                                        placeholder="Ulangi password baru">
                                    <div class="form-help">Harus sama dengan password baru</div>
                                    @error('password_confirmation')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="form-actions">
                        <a href="{{ route('petugas.peminjaman.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }, 5000);
            });

            // Password confirmation validation
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');

            function validatePasswordConfirmation() {
                if (password.value && passwordConfirmation.value && password.value !== passwordConfirmation.value) {
                    passwordConfirmation.classList.add('error');
                    if (!passwordConfirmation.parentElement.querySelector('.form-error')) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'form-error';
                        errorDiv.innerHTML = '<i class="fas fa-exclamation-circle icon"></i> Password tidak cocok';
                        passwordConfirmation.parentElement.appendChild(errorDiv);
                    }
                } else {
                    passwordConfirmation.classList.remove('error');
                    const errorDiv = passwordConfirmation.parentElement.querySelector('.form-error');
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                }
            }

            password.addEventListener('input', validatePasswordConfirmation);
            passwordConfirmation.addEventListener('input', validatePasswordConfirmation);

            // Form submission validation
            document.getElementById('settingsForm').addEventListener('submit', function(e) {
                const currentPassword = document.getElementById('current_password');
                const newPassword = document.getElementById('password');

                // If user wants to change password, current password is required
                if (newPassword.value && !currentPassword.value) {
                    e.preventDefault();
                    alert('Password lama diperlukan untuk mengubah password');
                    currentPassword.focus();
                    return;
                }
            });
        });
    </script>
</body>

</html>



<script>
    // Auto-hide alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            }, 5000);
        });

        // Password confirmation validation
        const password = document.getElementById('password');
        const passwordConfirmation = document.getElementById('password_confirmation');

        function validatePasswordConfirmation() {
            if (password.value && passwordConfirmation.value && password.value !== passwordConfirmation.value) {
                passwordConfirmation.classList.add('error');
                if (!passwordConfirmation.parentElement.querySelector('.form-error')) {
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'form-error';
                    errorDiv.innerHTML = '<i class="fas fa-exclamation-circle icon"></i> Password tidak cocok';
                    passwordConfirmation.parentElement.appendChild(errorDiv);
                }
            } else {
                passwordConfirmation.classList.remove('error');
                const errorDiv = passwordConfirmation.parentElement.querySelector('.form-error');
                if (errorDiv) {
                    errorDiv.remove();
                }
            }
        }

        password.addEventListener('input', validatePasswordConfirmation);
        passwordConfirmation.addEventListener('input', validatePasswordConfirmation);

        // Form submission validation
        document.getElementById('settingsForm').addEventListener('submit', function(e) {
            const currentPassword = document.getElementById('current_password');
            const newPassword = document.getElementById('password');

            // If user wants to change password, current password is required
            if (newPassword.value && !currentPassword.value) {
                e.preventDefault();
                alert('Password lama diperlukan untuk mengubah password');
                currentPassword.focus();
                return;
            }
        });
    });
</script>
</body>

</html>
