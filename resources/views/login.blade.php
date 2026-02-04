<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .logo {
            align-content: center;
            position: absolute;
            margin-top: -500px;
            margin-left: 60px;
        }

        .logo img {
            width: 450px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="logo">
        <img src="{{ asset('img/logo pustakadigital.png') }}" alt="">
    </div>
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
            <p class="text-sm text-gray-500 mt-1">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Form Login -->
        <form action="#" method="POST" class="space-y-6" autocomplete="off">

            <!-- Username / Email-->
            <div class="relative">
                <input type="email" name="email" autocomplete="new-password" required placeholder="Email"
                    class="peer w-full px-10 py-3 border rounded-lg placeholder-transparent
                 focus:outline-none focus:ring-2 focus:ring-blue-500" />

                <label
                    class="absolute left-10 top-3 text-gray-400 text-sm transition-all duration-300
                 peer-placeholder-shown:top-3
                 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-blue-600
                 bg-white px-1">
                    Email
                </label>

                <!-- User Icon -->
                <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                </svg>
            </div>

            <!-- Password -->
            <div class="relative">
                <input type="password" id="password" name="password" autocomplete="new-password" required
                    placeholder="Password"
                    class="peer w-full px-10 py-3 border rounded-lg placeholder-transparent
                 focus:outline-none focus:ring-2 focus:ring-blue-500" />

                <label
                    class="absolute left-10 top-3 text-gray-400 text-sm transition-all duration-300
                 peer-placeholder-shown:top-3
                 peer-focus:-top-2 peer-focus:text-xs peer-focus:text-blue-600
                 bg-white px-1">
                    Password
                </label>

                <!-- Lock Icon -->
                <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor"
                    stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V7.875a4.5 4.5 0 10-9 0V10.5m-.75 0h10.5A1.5 1.5 0 0118.75 12v6.75A1.5 1.5 0 0117.25 20.25H6.75A1.5 1.5 0 015.25 18.75V12a1.5 1.5 0 011.5-1.5z" />
                </svg>

                <!-- Eye Icon -->
                <button type="button" onclick="togglePassword()"
                    class="absolute right-3 top-3.5 text-gray-400 hover:text-gray-600">

                    <svg id="eyeOpen" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>

                    <svg id="eyeClose" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3l18 18M10.5 10.5a2.121 2.121 0 003 3M6.75 6.75C4.2 8.4 2.25 12 2.25 12s3.75 7.5 9.75 7.5c2.1 0 3.9-.6 5.4-1.5" />
                    </svg>

                </button>
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" class="rounded text-blue-600" />
                    Ingat saya
                </label>
                <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">Daftar</a>
        </p>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const open = document.getElementById('eyeOpen');
            const close = document.getElementById('eyeClose');

            if (input.type === 'password') {
                input.type = 'text';
                open.classList.add('hidden');
                close.classList.remove('hidden');
            } else {
                input.type = 'password';
                close.classList.add('hidden');
                open.classList.remove('hidden');
            }
        }
    </script>

</body>

</html>
