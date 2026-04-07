    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tambah Petugas - Admin | PustakaDigital</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
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

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: var(--bg);
                color: var(--text);
                line-height: 1.6;
            }

            .page-content {
                min-height: 100vh;
            }

            .content {
                max-width: 800px;
                margin: 0 auto;
                padding: 30px 20px;
            }

            .page-header {
                text-align: center;
                margin-bottom: 40px;
            }

            .page-header h2 {
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

            /* Form Card */
            .form-card {
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
                margin-bottom: 32px;
            }

            .form-section:last-child {
                margin-bottom: 0;
            }

            .section-title {
                font-size: 1.1rem;
                font-weight: 600;
                color: var(--text);
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .section-title .icon {
                color: var(--primary);
            }

            .form-row {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group.full-width {
                grid-column: 1 / -1;
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

            .form-control[readonly] {
                background: #f8fafc;
                cursor: not-allowed;
            }

            .form-select {
                appearance: none;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                background-position: right 0.5rem center;
                background-repeat: no-repeat;
                background-size: 1.5em 1.5em;
                padding-right: 2.5rem;
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

            /* Password Strength Indicator */
            .password-strength {
                margin-top: 8px;
            }

            .strength-meter {
                height: 4px;
                background: var(--border);
                border-radius: 2px;
                overflow: hidden;
                margin-bottom: 4px;
            }

            .strength-fill {
                height: 100%;
                transition: width 0.3s ease;
            }

            .strength-fill.weak {
                background: var(--error);
                width: 33%;
            }

            .strength-fill.medium {
                background: var(--warning);
                width: 66%;
            }

            .strength-fill.strong {
                background: var(--success);
                width: 100%;
            }

            .strength-text {
                font-size: 0.8rem;
                font-weight: 500;
            }

            .strength-text.weak {
                color: var(--error);
            }

            .strength-text.medium {
                color: var(--warning);
            }

            .strength-text.strong {
                color: var(--success);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .content {
                    padding: 20px 15px;
                }

                .page-header h2 {
                    font-size: 2rem;
                }

                .card-body {
                    padding: 24px 20px;
                }

                .form-row {
                    grid-template-columns: 1fr;
                    gap: 16px;
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
        @include('components.sidebar')
        @include('components.navbar')

        <div class="page-content">
            <div class="content">
                <div class="page-header">
                    <h2><i class="fas fa-user-plus"></i> Tambah Petugas Baru</h2>
                    <p>Tambahkan petugas baru ke dalam sistem perpustakaan</p>
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

                <form action="{{ url('admin/dataPengguna/petugas/store') }}" method="POST" id="createStaffForm">
                    @csrf

                    {{-- Personal Information Section --}}
                    <div class="form-card">
                        <div class="card-header">
                            <i class="fas fa-user icon"></i>
                            <h3>Informasi Personal</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label" for="name">
                                        <i class="fas fa-user-circle"></i> Nama Lengkap
                                    </label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') error @enderror" value="{{ old('name') }}"
                                        placeholder="Masukkan nama lengkap" required>
                                    <div class="form-help">Nama lengkap petugas sesuai KTP</div>
                                    @error('name')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="username">
                                        <i class="fas fa-at"></i> Username
                                    </label>
                                    <input type="text" id="username" name="username"
                                        class="form-control @error('username') error @enderror"
                                        value="{{ old('username') }}" placeholder="Masukkan username" required>
                                    <div class="form-help">Username untuk login ke sistem</div>
                                    @error('username')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label" for="email">
                                        <i class="fas fa-envelope"></i> Email
                                    </label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') error @enderror" value="{{ old('email') }}"
                                        placeholder="Masukkan alamat email" required>
                                    <div class="form-help">Email aktif untuk notifikasi dan recovery</div>
                                    @error('email')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="role">
                                        <i class="fas fa-user-tag"></i> Role
                                    </label>
                                    <select id="role" name="role"
                                        class="form-control form-select @error('role') error @enderror" required>
                                        <option value="">Pilih Role</option>
                                        <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas
                                        </option>
                                    </select>
                                    <div class="form-help">Level akses petugas di sistem</div>
                                    @error('role')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label" for="alamat">
                                    <i class="fas fa-map-marker-alt"></i> Alamat Lengkap
                                </label>
                                <input type="text" id="alamat" name="alamat"
                                    class="form-control @error('alamat') error @enderror" value="{{ old('alamat') }}"
                                    placeholder="Masukkan alamat lengkap" required>
                                <div class="form-help">Alamat sesuai KTP atau domisili saat ini</div>
                                @error('alamat')
                                    <div class="form-error">
                                        <i class="fas fa-exclamation-circle icon"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Account Security Section --}}
                    <div class="form-card">
                        <div class="card-header">
                            <i class="fas fa-lock icon"></i>
                            <h3>Keamanan Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label" for="password">
                                        <i class="fas fa-key"></i> Password
                                    </label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') error @enderror"
                                        placeholder="Masukkan password" required>
                                    <div class="form-help">Minimal 8 karakter dengan kombinasi huruf dan angka</div>
                                    <div class="password-strength" id="passwordStrength" style="display: none;">
                                        <div class="strength-meter">
                                            <div class="strength-fill" id="strengthFill"></div>
                                        </div>
                                        <div class="strength-text" id="strengthText"></div>
                                    </div>
                                    @error('password')
                                        <div class="form-error">
                                            <i class="fas fa-exclamation-circle icon"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password_confirmation">
                                        <i class="fas fa-key"></i> Konfirmasi Password
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') error @enderror"
                                        placeholder="Ulangi password" required>
                                    <div class="form-help">Harus sama dengan password di atas</div>
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
                        <a href="{{ route('admin.dataPengguna.petugas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Petugas
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Petugas
                        </button>
                    </div>
                </form>
            </div>
        </div>

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

                // Password strength indicator
                const password = document.getElementById('password');
                const strengthMeter = document.getElementById('passwordStrength');
                const strengthFill = document.getElementById('strengthFill');
                const strengthText = document.getElementById('strengthText');

                password.addEventListener('input', function() {
                    const value = this.value;
                    if (value.length === 0) {
                        strengthMeter.style.display = 'none';
                        return;
                    }

                    strengthMeter.style.display = 'block';
                    let strength = 0;
                    let feedback = [];

                    // Length check
                    if (value.length >= 8) strength += 1;
                    else feedback.push('Minimal 8 karakter');

                    // Lowercase check
                    if (/[a-z]/.test(value)) strength += 1;
                    else feedback.push('Huruf kecil');

                    // Uppercase check
                    if (/[A-Z]/.test(value)) strength += 1;
                    else feedback.push('Huruf besar');

                    // Number check
                    if (/[0-9]/.test(value)) strength += 1;
                    else feedback.push('Angka');

                    // Special character check
                    if (/[^A-Za-z0-9]/.test(value)) strength += 1;
                    else feedback.push('Karakter khusus');

                    // Update UI
                    strengthFill.className = 'strength-fill';
                    strengthText.className = 'strength-text';

                    if (strength <= 2) {
                        strengthFill.classList.add('weak');
                        strengthText.classList.add('weak');
                        strengthText.textContent = 'Lemah: ' + feedback.join(', ');
                    } else if (strength <= 4) {
                        strengthFill.classList.add('medium');
                        strengthText.classList.add('medium');
                        strengthText.textContent = 'Sedang: Tambahkan ' + feedback.slice(0, 2).join(', ');
                    } else {
                        strengthFill.classList.add('strong');
                        strengthText.classList.add('strong');
                        strengthText.textContent = 'Kuat! Password sudah aman';
                    }
                });

                // Password confirmation validation
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
                        if (errorDiv && errorDiv.textContent.includes('Password tidak cocok')) {
                            errorDiv.remove();
                        }
                    }
                }

                password.addEventListener('input', validatePasswordConfirmation);
                passwordConfirmation.addEventListener('input', validatePasswordConfirmation);

                // Form submission validation
                document.getElementById('createStaffForm').addEventListener('submit', function(e) {
                    const requiredFields = ['name', 'username', 'email', 'alamat', 'role', 'password',
                        'password_confirmation'
                    ];
                    let hasErrors = false;

                    requiredFields.forEach(field => {
                        const element = document.getElementById(field);
                        if (!element.value.trim()) {
                            element.classList.add('error');
                            hasErrors = true;
                        } else {
                            element.classList.remove('error');
                        }
                    });

                    if (hasErrors) {
                        e.preventDefault();
                        alert('Mohon lengkapi semua field yang wajib diisi');
                        return;
                    }
                });
            });
        </script>
    </body>

    </html>
