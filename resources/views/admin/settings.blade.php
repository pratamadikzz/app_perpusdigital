<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <div class="container">
        <h2>Pengaturan Akun</h2>

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <div>
                <label>Username</label>
                <input type="text" name="username" value="{{ $staff->username }}">
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ $staff->email }}">
            </div>

            <hr>

            <h4>Ganti Password</h4>

            <div>
                <label>Password Baru</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin ganti">
            </div>

            <br>
            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>
