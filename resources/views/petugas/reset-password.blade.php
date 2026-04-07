<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password Petugas | Perpustakaan Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    * { box-sizing: border-box; font-family: 'Inter', sans-serif; }
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      overflow: hidden;
    }
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      pointer-events: none;
    }
    .login-container {
      width: 100%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(10px);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0,0,0,0.2), 0 0 0 1px rgba(255,255,255,0.1);
      animation: fadeInUp 0.6s ease-out;
      position: relative;
      z-index: 1;
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .login-header h1 {
      font-size: 2rem;
      font-weight: 700;
      color: #2d3748;
      margin: 0 0 10px 0;
    }
    .login-header p {
      color: #718096;
      margin: 0;
      font-size: 0.95rem;
    }
    .form-group {
      margin-bottom: 20px;
      position: relative;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #2d3748;
    }
    .form-group .input-wrapper {
      position: relative;
    }
    .form-group .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 1rem;
      z-index: 1;
    }
    .form-group .eye-btn {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #a0aec0;
      cursor: pointer;
      font-size: 1rem;
      z-index: 1;
    }
    .form-group .eye-btn:hover {
      color: #667eea;
    }
    .form-group input {
      width: 100%;
      padding: 12px 45px 12px 45px;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: #f7fafc;
    }
    .form-group input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      background: #ffffff;
    }
    .form-group input::placeholder {
      color: #a0aec0;
    }
    .login-btn {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 20px;
    }
    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    .login-btn:active {
      transform: translateY(0);
    }
    .login-footer {
      text-align: center;
      margin-top: 20px;
    }
    .login-footer p {
      margin: 0;
      font-size: 0.9rem;
      color: #718096;
    }
    .login-footer a {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
    }
    .login-footer a:hover {
      text-decoration: underline;
    }
    .notification {
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .notification.error {
      background: #fed7d7;
      color: #742a2a;
      border: 1px solid #feb2b2;
    }
    .notification .icon {
      font-size: 1.1rem;
      flex-shrink: 0;
    }
  </style>
</head>
<body>
  <div class="login-container">
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

    <form action="{{ route('staff.password.update') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrapper">
          <i class="fas fa-envelope input-icon"></i>
          <input type="email" id="email" name="email" placeholder="Masukkan alamat email" value="{{ old('email') }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="password">Password Baru</label>
        <div class="input-wrapper">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="password" name="password" placeholder="Masukkan password baru" required>
          <button type="button" class="eye-btn" onclick="togglePassword()">
            <i class="fas fa-eye" id="eyeIcon"></i>
          </button>
        </div>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <div class="input-wrapper">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" name="password_confirmation" placeholder="Konfirmasi password" required>
        </div>
      </div>
      <button type="submit" class="login-btn">
        <i class="fas fa-save"></i> Reset Password
      </button>
    </form>
    <div class="login-footer">
      <p><a href="{{ route('petugas.login') }}">← Kembali ke Login</a></p>
    </div>
  </div>

  <script>
    function togglePassword() {
      event.preventDefault();
      const input = document.getElementById('password');
      const icon = document.getElementById('eyeIcon');

      if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fas fa-eye-slash';
      } else {
        input.type = 'password';
        icon.className = 'fas fa-eye';
      }
    }
  </script>
</body>
</html>