<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Petugas | Perpustakaan Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; font-family: 'Inter', sans-serif; }
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
    }
    .login-container {
      width: 100%;
      max-width: 420px;
      background: #ffffff;
      padding: 32px;
      border-radius: 16px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    .login-header {
      text-align: center;
      margin-bottom: 24px;
    }
    .login-header h1 {
      margin: 0;
      font-size: 24px;
      font-weight: 600;
      color: #1e3c72;
    }
    .login-header p {
      margin-top: 8px;
      font-size: 14px;
      color: #666;
    }
    .form-group {
      margin-bottom: 18px;
    }
    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      font-weight: 500;
      color: #333;
    }
    .form-group input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 10px;
      border: 1px solid #ddd;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    .form-group input:focus {
      outline: none;
      border-color: #2a5298;
      box-shadow: 0 0 0 2px rgba(42,82,152,0.15);
    }
    .login-btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      background: #2a5298;
      color: #fff;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .login-btn:hover {
      background: #1e3c72;
    }
    .login-footer {
      margin-top: 20px;
      text-align: center;
      font-size: 13px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h1>Login Petugas</h1>
      <p>Perpustakaan Digital</p>
    </div>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="login-btn">Masuk</button>
    </form>
    <div class="login-footer">
      © 2026 Perpustakaan Digital
    </div>
  </div>
</body>
</html>
