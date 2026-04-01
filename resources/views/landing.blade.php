<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Perpustakaan Digital</title>
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
            scroll-behavior: smooth;
        }

        a {
            color: inherit;
        }

        /* NAVBAR */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
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
            gap: 8px;
        }

        nav .logo img {
            height: 40px;
            width: 40px;
        }

        nav .logo span {
           font-weight: 700;
           font-size: 18px;
        }

        nav ul {
            display: flex;
            gap: 24px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav ul li a {
            position: relative;
            text-decoration: none;
            padding: 10px 0;
            font-weight: 600;
            color: var(--text);
            transition: color var(--transition);
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -2px;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--primary);
            border-radius: 999px;
            transition: width var(--transition);
        }

        nav ul li a:hover {
            color: var(--primary);
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        nav ul li a.button {
            padding: 10px 18px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: #fff;
        }

        nav ul li a.button:hover {
            filter: brightness(1.05);
        }

        /* Hero */
        .hero {
            min-height: 90vh;
            padding: 120px 32px 64px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            align-items: center;
            gap: 48px;
            max-width: 1180px;
            margin: 0 auto;
        }

        .hero-text h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            line-height: 1.05;
            margin: 0;
            color: var(--primary);
        }

        .hero-text p {
            margin: 18px 0 30px;
            max-width: 520px;
            font-size: 1.05rem;
            color: var(--muted);
            line-height: 1.6;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-actions .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            border-radius: 999px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: transform var(--transition), box-shadow var(--transition);
            text-decoration: none;
        }

        .hero-actions .btn.primary {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: #fff;
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
        }

        .hero-actions .btn.secondary {
            background: rgba(59, 130, 246, 0.12);
            color: var(--primary);
        }

        .hero-actions .btn:hover {
            transform: translateY(-2px);
        }

        .hero-visual {
            display: flex;
            justify-content: center;
        }

        .hero-visual img {
            max-width: 100%;
            border-radius: 24px;
            box-shadow: var(--shadow);
        }

        /* Features */
        .features {
            padding: 80px 32px;
            max-width: 1180px;
            margin: 0 auto;
        }

        .features h2 {
            font-size: 2.25rem;
            margin: 0 0 20px;
            color: var(--primary);
            text-align: center;
        }

        .features p {
            max-width: 680px;
            margin: 0 auto 48px;
            color: var(--muted);
            text-align: center;
            line-height: 1.7;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
        }

        .feature-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 28px 22px;
            box-shadow: 0 12px 25px rgba(15, 23, 42, 0.06);
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: transform var(--transition), box-shadow var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }

        .feature-card i {
            font-size: 28px;
            color: var(--secondary);
            margin-bottom: 12px;
        }

        .feature-card h3 {
            margin: 0 0 10px;
            font-size: 1.15rem;
            color: var(--text);
        }

        .feature-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
        }

        /* Testimonials */
        .testimonials {
            padding: 80px 32px;
            background: rgba(37, 99, 235, 0.08);
        }

        .testimonials h2 {
            font-size: 2.25rem;
            margin-bottom: 16px;
            text-align: center;
            color: var(--primary);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
            max-width: 1040px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .testimonial-card p {
            margin: 0 0 18px;
            color: var(--muted);
            line-height: 1.6;
        }

        .testimonial-card .author {
            font-weight: 700;
            color: var(--text);
        }

        .testimonial-card .role {
            font-size: 0.9rem;
            color: rgba(100, 116, 139, 0.9);
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 60px 32px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 32px;
            max-width: 1180px;
            margin: 0 auto;
        }

        footer h3 {
            margin-bottom: 18px;
            font-size: 1.2rem;
            color: #ffffff;
        }

        footer p,
        footer a {
            color: rgba(203, 213, 225, 0.9);
            font-size: 0.95rem;
            line-height: 1.7;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffffff;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .socials {
            display: flex;
            gap: 12px;
            margin-top: 14px;
        }

        .socials a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 0.9rem;
            transition: background var(--transition);
        }

        .socials a:hover {
            background: rgba(255, 255, 255, 0.16);
        }

        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .newsletter-form input {
            padding: 8px 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
        }

        .newsletter-form input::placeholder {
            color: rgba(203, 213, 225, 0.7);
        }

        .newsletter-form .btn {
            align-self: flex-start;
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 8px 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
            font-family: inherit;
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: rgba(203, 213, 225, 0.7);
        }

        .contact-form .btn {
            align-self: flex-start;
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: var(--surface);
            width: 100%;
            max-width: 580px;
            padding: 26px;
            border-radius: 18px;
            box-shadow: var(--shadow);
            position: relative;
        }

        .modal-content h2 {
            margin-top: 0;
            color: var(--primary);
        }

        .modal-close {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            border: none;
            background: rgba(15, 23, 42, 0.08);
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--text);
        }

        /* Responsive */
        @media (max-width: 860px) {
            nav {
                padding: 14px 22px;
            }

            .hero {
                padding: 100px 22px 48px;
            }

            .hero-visual {
                order: -1;
            }
        }

        @media (max-width: 600px) {
            nav ul {
                display: none;
            }

            .hero {
                padding: 90px 18px 42px;
                grid-template-columns: 1fr;
            }

            .features,
            .testimonials {
                padding: 60px 18px;
            }

            .hero-actions .btn {
                min-height: 48px;
                font-size: 1rem;
                padding: 16px 24px;
            }

            .feature-card .btn {
                min-height: 44px;
                font-size: 0.95rem;
                padding: 12px 20px;
            }

            .newsletter-form .btn,
            .contact-form .btn {
                min-height: 44px;
                font-size: 0.95rem;
                padding: 12px 20px;
            }

            .modal-content {
                padding: 20px;
            }

            .modal-close {
                width: 44px;
                height: 44px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
           <img src="{{ asset('img/logo pustakadigital - Copy.png') }}" alt="">
             <span style="color: #003A9B">Pustaka<span style="color: #0278F3">Digital</span></span>
        </div>
        <ul>
            <li><a href="#features">Fitur</a></li>
            <li><a href="#testimonials">Testimoni</a></li>
            <li><a href="#books">Karya</a></li>
            <li><a href="#kontak">Kontak</a></li>
            <li><a href="{{ route('auth/login') }}" class="button">Login</a></li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <h1>Perpustakaan Digital untuk <br> Akses Ilmu Tanpa Batas</h1>
            <p>Baca buku di mana saja dan kapan saja. Kelola koleksi, pinjam, dan kembalikan dengan mudah.</p>
            <div class="hero-actions">
                <a href="{{ route('auth/login') }}" class="btn primary">Jelajahi Pustaka</a>
            </div>
        </div>
        <div class="hero-visual">
            <img src="img/gambar landing page 1 remove bg.png" alt="Ilustrasi perpustakaan digital">
        </div>
    </section>


    <section id="testimonials" class="testimonials">
        <h2>Pendapat Para Akademisi</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p>“Education is not the learning of facts, but the training of the mind to think.”</p>
                <div class="author">— Albert Einstein</div>
            </div>
            <div class="testimonial-card">
                <p>“An investment in knowledge pays the best interest.”</p>
                <div class="author">— Benjamin Franklin</div>
            </div>
            <div class="testimonial-card">
                <p>“Books are a uniquely portable magic.”</p>
                <div class="author">— Stephen King</div>
            </div>
            <div class="testimonial-card">
                <p>“Technology is best when it brings people together.”</p>
                <div class="author">— Matt Mullenweg</div>
            </div>
        </div>
    </section>


    <section id="books" class="features">
        <h2>Karya Terpilih</h2>
        <p>Selami koleksi terbaik kami dan mulai jelajahi dunia literasi. Semua dapat diakses kapan saja lewat satu
            akun.</p>

        <div class="feature-grid">
            @php
                $books = \App\Models\Book::take(6)->get();
            @endphp
            @foreach ($books as $book)
                <div class="feature-card">
                    <i class="fa fa-book"></i>
                    <h3>{{ $book->title }}</h3>
                    <p class="muted">{{ $book->author }} · {{ $book->category->nama ?? 'Kategori' }}</p>
                    <p class="muted">{{ Str::limit($book->description, 50) }}</p>
                    <a href="#" class="btn secondary">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </section>

    <section id="features" class="features">
        <h2>Mulai Sekarang</h2>
        <p>Jelajahi koleksi, pinjam buku, dan gunakan laporan untuk mengelola perpustakaan secara efisien.</p>

        <div class="feature-grid">
            <div class="feature-card">
                <i class="fa fa-id-card"></i>
                <h3>Daftar dan Masuk</h3>
                <p>Buat akun dan masukkan informasi Anda untuk mendapatkan akses penuh ke seluruh fitur.</p>
            </div>
            <div class="feature-card">
                <i class="fa fa-book-reader"></i>
                <h3>Pinjam & Kembalikan</h3>
                <p>Kelola peminjaman dengan mudah, cetak struk, dan serahkan kepada petugas saat mengambil buku.</p>
            </div>
            <div class="feature-card">
                <i class="fa fa-chart-line"></i>
                <h3>Laporan & Statistik</h3>
                <p>Dapatkan ringkasan aktivitas perpustakaan dalam satu dashboard yang mudah dibaca.</p>
            </div>
        </div>
        <div class="hero-actions" style="justify-content:center; margin-top:32px;">
            <a href="{{ route('auth/login') }}" class="btn primary">Mulai Sekarang</a>
            {{-- <button class="btn secondary open-panduan">Lihat Panduan</button> --}}
        </div>
    </section>

    <div class="modal" id="panduanModal">
        <div class="modal-content">
            <button class="modal-close" aria-label="Tutup">&times;</button>
            <h2>Panduan Aplikasi Perpustakaan Digital</h2>
            <ol>
                <li>Login atau daftar akun.</li>
                <li>Cari buku melalui kolom pencarian.</li>
                <li>Pilih buku dan lihat detailnya.</li>
                <li>Ajukan peminjaman dan isi formulir.</li>
                <li>Cetak struk dan serahkan ke petugas.</li>
            </ol>
        </div>
    </div>

    {{-- footer --}}
    <footer id="kontak" class="footer">
        <div class="footer-grid">

            <div class="footer-col">
                <h3>PustakaDigital</h3>
                <p>Perpustakaan digital untuk akses buku, jurnal, dan referensi kapan saja dan di mana saja.</p>
                <div class="badges">
                    <span>Edu</span>
                    <span>Digital Library</span>
                </div>
            </div>

            <div class="footer-col">
                <h4>Menu</h4>
                <ul class="footer-links">
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#books">Karya</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>

            {{-- <div class="footer-col">
                <h4>Layanan</h4>
                <ul class="footer-links">
                    <li><a href="#">Baca Online</a></li>
                    <li><a href="#">Unduh Buku</a></li>
                    <li><a href="#">Keanggotaan</a></li>
                    <li><a href="#">Bantuan</a></li>
                </ul>
            </div> --}}

            {{-- <div class="footer-col">
                <h4>Newsletter</h4>
                <p>Berlangganan untuk update terbaru koleksi buku.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Email Anda" required>
                    <button type="submit" class="btn primary">Berlangganan</button>
                </form>
            </div> --}}

            <div class="footer-col">
                <h4>Kontak Kami</h4>
                <p><strong>Alamat:</strong> Jl. Perpustakaan Digital No. 123, Kota Buku, Indonesia</p>
                <p><strong>Email:</strong> info@pustakadigital.id</p>
                <p><strong>Telepon:</strong> +62 21-1234-5678</p>
                <p><strong>Jam Operasional:</strong> Senin-Jumat, 08:00-17:00 WIB</p>
                <div class="socials">
                    <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                </div>
            </div>

        </div>
    </footer>

    {{-- script modal panduan --}}
    <script>
        const openButtons = document.querySelectorAll('.open-panduan');
        const modal = document.getElementById('panduanModal');
        const closeBtn = document.querySelector('.modal-close');

        openButtons.forEach((btn) => {
            btn.addEventListener('click', () => modal.classList.add('show'));
        });

        closeBtn.addEventListener('click', () => modal.classList.remove('show'));

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });
    </script>
</body>

</html>
