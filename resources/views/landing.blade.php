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

        /* Book Cards */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .book-card {
            background: var(--surface);
            border-radius: var(--radius);
            box-shadow: 0 12px 25px rgba(15, 23, 42, 0.06);
            border: 1px solid rgba(226, 232, 240, 0.8);
            overflow: hidden;
            transition: transform var(--transition), box-shadow var(--transition);
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.15);
        }

        .book-cover {
            height: 200px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .book-card:hover .cover-image {
            transform: scale(1.05);
        }

        .no-cover {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            text-align: center;
            padding: 20px;
        }

        .no-cover i {
            font-size: 48px;
            margin-bottom: 8px;
            opacity: 0.6;
        }

        .no-cover span {
            font-size: 14px;
            font-weight: 500;
        }

        .book-info {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .book-title {
            margin: 0 0 8px 0;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text);
            line-height: 1.3;
        }

        .book-author {
            margin: 0 0 4px 0;
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .book-category {
            margin: 0 0 12px 0;
            color: var(--muted);
            font-size: 0.85rem;
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            padding: 4px 8px;
            border-radius: 12px;
            display: inline-block;
            font-weight: 500;
        }

        .book-description {
            margin: 0 0 16px 0;
            color: var(--muted);
            line-height: 1.6;
            flex: 1;
        }

        .book-meta {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
        }

        .stock-info, .year-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: var(--muted);
            font-weight: 500;
        }

        .stock-info i, .year-info i {
            color: var(--secondary);
        }

        .btn-book-detail {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all var(--transition);
            align-self: flex-start;
        }

        .btn-book-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.3);
            color: white;
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
            gap: 12px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .contact-form input,
        .contact-form select,
        .contact-form textarea {
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
            font-family: inherit;
            font-size: 0.9rem;
            transition: all var(--transition);
        }

        .contact-form input:focus,
        .contact-form select:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: var(--accent);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.2);
        }

        .contact-form select {
            cursor: pointer;
        }

        .contact-form textarea {
            resize: vertical;
            min-height: 80px;
        }

        .contact-form input::placeholder,
        .contact-form select::placeholder,
        .contact-form textarea::placeholder {
            color: rgba(203, 213, 225, 0.7);
        }

        .btn-contact-submit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--accent) 0%, #f97316 100%);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all var(--transition);
            align-self: flex-start;
        }

        .btn-contact-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
            color: white;
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

    @if(session('success'))
        <div id="successAlert" style="position: fixed; top: 100px; right: 20px; background: #10b981; color: white; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3); z-index: 1000; font-weight: 500;">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('successAlert');
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }
            }, 5000);
        </script>
    @endif
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

        <div class="books-grid">
            @php
                $books = \App\Models\Book::with('categories')->take(6)->get();
            @endphp
            @foreach ($books as $book)
                <div class="book-card">
                    <div class="book-cover">
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="cover-image">
                        @else
                            <div class="no-cover">
                                <i class="fas fa-book"></i>
                                <span>Tidak ada cover</span>
                            </div>
                        @endif
                    </div>
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->title }}</h3>
                        <p class="book-author">{{ $book->author }}</p>
                        <p class="book-category">{{ $book->category_list ?: 'Kategori' }}</p>
                        <p class="book-description">{{ Str::limit($book->description, 80) }}</p>
                        <div class="book-meta">
                            <span class="stock-info">
                                <i class="fas fa-boxes"></i>
                                Stok: {{ $book->stock }}
                            </span>
                            <span class="year-info">
                                <i class="fas fa-calendar"></i>
                                {{ $book->publication_year }}
                            </span>
                        </div>
                        <a href="{{ route('auth/login') }}" class="btn-book-detail">
                            <i class="fas fa-eye"></i>
                            Lihat Detail
                        </a>
                    </div>
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
                <h4>Tulis Pesan</h4>
                <p>Kirim pesan kepada admin atau petugas perpustakaan. Kami akan segera merespons pertanyaan Anda.</p>

                <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email Anda" required>
                    </div>
                    <div class="form-group">
                        <select name="recipient" required>
                            <option value="">Pilih Penerima</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Tulis pesan Anda..." rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn-contact-submit">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>
                </form>
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
