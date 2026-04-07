<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Petugas | Perpustakaan Digital</title>
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
      margin-bottom: 32px;
    }
    .login-header .icon {
      font-size: 48px;
      color: #667eea;
      margin-bottom: 16px;
    }
    .login-header h1 {
      margin: 0;
      font-size: 28px;
      font-weight: 700;
      color: #2d3748;
      letter-spacing: -0.5px;
    }
    .login-header p {
      margin-top: 8px;
      font-size: 16px;
      color: #718096;
      font-weight: 400;
    }
    .alert {
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 500;
    }
    .alert-error {
      background-color: #fed7d7;
      color: #c53030;
      border: 1px solid #feb2b2;
    }
    .form-group {
      margin-bottom: 24px;
      position: relative;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-size: 14px;
      font-weight: 600;
      color: #4a5568;
    }
    .form-group .input-wrapper {
      position: relative;
    }
    .form-group .input-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 16px;
      z-index: 1;
    }
    .form-group input {
      width: 100%;
      padding: 14px 14px 14px 44px;
      border-radius: 12px;
      border: 2px solid #e2e8f0;
      font-size: 16px;
      transition: all 0.3s ease;
      background: #ffffff;
    }
    .form-group input:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      background: #ffffff;
    }
    .form-group input::placeholder {
      color: #cbd5e0;
    }
    .login-btn {
      width: 100%;
      padding: 16px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #ffffff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 8px;
      position: relative;
      overflow: hidden;
    }
    .login-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    .login-btn:hover::before {
      left: 100%;
    }
    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    .login-btn:active {
      transform: translateY(0);
    }
    .login-footer {
      margin-top: 32px;
      text-align: center;
      font-size: 14px;
      color: #a0aec0;
    }
    .login-footer a {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    .login-footer a:hover {
      color: #764ba2;
      text-decoration: underline;
    }
    @media (max-width: 480px) {
      .login-container {
        margin: 20px;
        padding: 32px 24px;
      }
      .login-header h1 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <div class="icon">
        <i class="fas fa-user-shield"></i>
      </div>
      <h1>Login Petugas</h1>
      <p>Sistem Perpustakaan Digital</p>
    </div>
    @if(session('error'))
    <div class="alert alert-error">
      <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
    </div>
    @endif
    <form action="/petugas/login" method="POST">
        @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrapper">
          <i class="fas fa-envelope input-icon"></i>
          <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
        </div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrapper">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>
      </div>
      <button type="submit" class="login-btn">
        <i class="fas fa-sign-in-alt"></i> Masuk ke Sistem
      </button>
    </form>
    <div class="login-footer">
      <p><a href="{{ route('staff.password.request') }}">Lupa Password?</a></p>
      <p>&copy; 2026 Perpustakaan Digital. <a href="/">Kembali ke Beranda</a></p>
    </div>
  </div>
</body>
</html>
