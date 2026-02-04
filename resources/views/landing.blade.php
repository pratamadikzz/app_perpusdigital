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
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to right,
                    #b9cceb 0%,
                    #afc4e6 10%,
                    #5290F7 100%,
                    #3B82F6 100%);
        }

        nav {
            display: flex;
            justify-content: flex-end;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            padding: 20px 40px;
            font-family: 'Poppins', sans-serif;
            align-items: center;
            z-index: 1000;
            margin-top: -100px;
        }

        nav .logo img {
            height: 250px;
            width: auto;
            margin-left: 30px;
        }

        nav ul li {
            list-style-type: none;
            display: inline;
        }

        nav ul {
            margin-left: auto;
        }

        nav ul li a {
            position: relative;
            text-decoration: none;
            margin-left: 40px;
            padding-bottom: 6px;
            color: black;
            font-weight: 600;
        }

        nav ul li a::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -5px;
            width: 0;
            height: 2px;
            background-color: #141B6F;
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        nav ul .lgn a {
            color: white;
            background-color: #1E3A8A;
            border-radius: 10px;
            padding: 15px;
        }

        nav ul .lgn a:hover {
            color: white;
            background-color: #2f498f;
            border-radius: 10px;
            padding: 15px;
        }

        .sectfirst {
            font-family: sans-serif;
            margin-top: 200px;
            margin-left: 50px;
            font-family: 'Inter', sans-serif;
        }

        .sectfirst h2 {
            font-size: 40px;
            font-style: italic;
            font-weight: 800;
            font-family: 'Inter', sans-serif;
            margin-top: -20px;
            color: #1E3A8A;
        }

        .sectfirst h4 {
            color: #3216A3;
        }

        .sectfirst a {
            text-decoration: none;
            margin-top: 10px;
            position: absolute;
            background: linear-gradient(to right,
                    #2634D5,
                    #141B6F);
            padding: 20px;
            color: white;
            border-radius: 10px;
            transition:
                background 0.4s ease,
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .sectfirst a:hover {
            text-decoration: none;
            margin-top: 10px;
            position: absolute;
            background: linear-gradient(to right,
                    #646cca,
                    #4a54be);
            padding: 20px;
            color: white;
            border-radius: 10px;
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .sectfirst p {
            font-size: 20px;
            margin-top: -20px;
        }

        .sectfirst img {
            height: 350px;
            width: auto;
            position: relative;
            margin-left: 600px;
            margin-top: -250px;
        }

        .timeline-section {
            padding: 60px 0;
        }

        .timeline-title {
            text-align: center;
            font-size: 32px;
            font-weight: 700;
            font-family: 'inter', sans-serif;
            background: linear-gradient(to right, #1c2691, #141B6F);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 50px;
        }

        /* Timeline container */
        .timeline {
            position: relative;
            max-width: 900px;
            margin: auto;
        }

        /* Garis tengah */
        .timeline::after {
            content: '';
            position: absolute;
            width: 3px;
            background-color: #1c2691;
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Item */
        .timeline-item {
            padding: 20px 40px;
            position: relative;
            width: 50%;
        }

        .timeline-item.left {
            left: -6%;
            text-align: right;
        }

        .timeline-item.right {
            left: 47%;
        }

        /* Card */
        .timeline-item .content {
            background: #e5e5e5;
            padding: 18px 22px;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .timeline-item .content p {
            font-style: italic;
            margin: 0 0 8px;
        }

        .timeline-item .content span {
            font-weight: 600;
            font-size: 14px;
        }

        /* Panah segitiga */
        .timeline-item.left .content::after {
            content: '';
            position: absolute;
            top: 20px;
            right: -10px;
            border-width: 10px 0 10px 10px;
            border-style: solid;
            border-color: transparent transparent transparent #e5e5e5;
        }

        .timeline-item.right .content::after {
            content: '';
            position: absolute;
            top: 20px;
            left: -10px;
            border-width: 10px 10px 10px 0;
            border-style: solid;
            border-color: transparent #e5e5e5 transparent transparent;
        }

        .box-1 {
            background-color: white;
            width: 300px;
            height: 500px;
            border-radius: 20px;
            margin-left: 50px;
            border: 1px solid black;
        }

        .img-educated {
            width: 250px;
            height: 350px;
            margin-left: 25px;
        }

        .img-educated img {
            width: 250px;
            height: 350px;
        }

        /* judul section buku */
        .tittle-section {
            font-family: 'inter', sans-serif;
            color: #0D3071;
            text-align: center;
        }

        /* content buku */
        .container-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-left: 50px;  
        }

        .book-section .box-1 p {
            font-family: 'poppins', sans-serif;
            margin-left: 25px;
        }

        .book-section .box-1 p {
            font-family: 'poppins', sans-serif;
            margin-left: 25px;
        }

        .book-section .box-1 .tittle {
            font-family: 'poppins', sans-serif;
            margin-left: 25px;
            color: #615C5C;
            margin-top: -10px;
        }

        .book-section .box-1 .author {
            font-family: 'poppins', sans-serif;
            margin-left: 25px;
            color: #787070;
        }

        .book-section .box-1 .btn-1 {
            background-color: #2A399C;
            margin-left: 25px;
            margin-top: -20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-family: 'inter', sans-serif;
        }

        .book-section .box-1 .btn-1 a {
            width: 300px;
            height: 300px;
            color: white;
            text-decoration: none;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: (30, 58, 138, 0.6);
            z-index: 1000;
        }

        .modal-content {
            background-color: #F8FAFC;
            width: 90%;
            max-width: 500px;
            margin: 80px auto;
            padding: 25px;
            border-radius: 15px;
        }

        .modal h2 {
            color: #1E3A8A;
        }

        .close {
            float: right;
            font-size: 22px;
            cursor: pointer;
            color: #1E3A8A;
        }

        .footer {
            background: linear-gradient(135deg, #0f172a, #020617);
            color: #cbd5e1;
            padding: 60px 40px;
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
        }

        .footer h3,
        .footer h4 {
            color: #ffffff;
            margin-bottom: 16px;
        }

        .footer p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
        }

        .footer ul li a {
            text-decoration: none;
            color: #94a3b8;
            font-size: 14px;
            transition: color 0.3s;
        }

        .footer ul li a:hover {
            color: #38bdf8;
        }

        .badges span {
            display: inline-block;
            background: #1e293b;
            color: #e2e8f0;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            margin-right: 8px;
            margin-top: 10px;
        }

        .section-stats .stats {
            background-color: white;
            width: 100%;
            height: 700px;
            z-index: 1000;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            justify-items: center;
        }

        /* Card */
        .stat-card {
            width: 320px;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            gap: 15px;
            align-items: flex-start;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Card akses di tengah */
        .stat-card.center {
            grid-column: 2 / 3;
        }

        /* Icon */
        .icon {
            width: 60px;
            height: 50px;
            border-radius: 10px;
        }

        .icon.blue {
            background: #1e40af;
        }

        .icon.orange {
            background: #c58b3a;
        }

        .icon.green {
            background: #2ecc40;
        }

        .icon.red {
            background: #8b2c2c;
        }

        /* Text */
        .label {
            font-size: 12px;
            color: #555;
            letter-spacing: 1px;
        }

        .stat-content h2 {
            margin: 5px 0;
            font-size: 28px;
            color: #000;
        }

        .stat-content small {
            color: #666;
            font-size: 13px;
        }

        .section-fitur .fitur-unggulan {
            position: relative;
            margin-top: -90px;
            background-color: white;
            width: 100%;
            height: 700px;
            z-index: 1000;
        }

        .section-alasan .alasan {
            position: relative;
            margin-top: -90px;
            background-color: white;
            width: 100%;
            height: 700px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="img/logo pustakadigital.png" alt="logo">
        </div>
        <ul>
            {{-- <li><a href="{{ route('landing') }}">Beranda</a></li> --}}
            <li><a href="">Tentang</a></li>
            <li><a href="#" id="openPanduan">Panduan</a></li>
            <li><a href="">Kontak</a></li>
            {{-- <li class="lgn"><a href="">Login</a></li> --}}
        </ul>
    </nav>

    <div class="sectfirst">
        <h4>Halo, Selamat Datang</h4>
        <h2>Perpustakaan Digital untuk <br> Akses Ilmu Tanpa Batas</h2>
        <p>Baca Buku Dimana Saja dan Kapan saja</p>
        {{-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> --}}
        <a href="{{ route('login') }}">Jelajahi Pustaka</a>
        <img src="img/gambar landing page 1 remove bg.png" alt="">
    </div>
    <br><br><br><br><br><br><br><br><br><br>


    <section class="timeline-section">
        <h1 class="timeline-title">Pandangan Para Akademisi</h1>

        <div class="timeline">
            <div class="timeline-item left">
                <div class="content">
                    <p>“Education is not the learning of facts, but the training of the mind to think.”</p>
                    <span>— Albert Einstein</span>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="content">
                    <p>“An investment in knowledge pays the best interest.”</p>
                    <span>— Benjamin Franklin</span>
                </div>
            </div>

            <div class="timeline-item left">
                <div class="content">
                    <p>“The more that you read, the more things you will know.”</p>
                    <span>— Dr. Seuss</span>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="content">
                    <p>“Reading is essential for those who seek to rise above the ordinary.”</p>
                    <span>— Jim Rohn</span>
                </div>
            </div>

            <div class="timeline-item left">
                <div class="content">
                    <p>“Once you learn to read, you will be forever free.”</p>
                    <span>— Frederick Douglass</span>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="content">
                    <p>“Information is the oil of the 21st century, and analytics is the combustion engine.”</p>
                    <span>— Peter Sondergaard (Gartner)</span>
                </div>
            </div>
            <div class="timeline-item left">
                <div class="content">
                    <p>“The function of education is to teach one to think intensively and critically."</p>
                    <span>— Martin Luther King Jr</span>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="content">
                    <p>“Knowledge comes, but wisdom lingers.”</p>
                    <span>— Alfred Lord Tennyson</span>
                </div>
            </div>
            <div class="timeline-item left">
                <div class="content">
                    <p>“Books are a uniquely portable magic.”</p>
                    <span>— Stephen King</span>
                </div>
            </div>

            <div class="timeline-item right">
                <div class="content">
                    <p>“Technology is best when it brings people together.”</p>
                    <span>— Matt Mullenweg</span>
                </div>
            </div>
        </div>
    </section>


    <br><br><br><br><br>
    <h1 class="tittle-section">Karya Berpengaruh Sepanjang Masa</h1>
    <div class="container-section">
        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>

        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>

        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>
        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>

        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>

        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>
        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>

        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>

        <section class="book-section">
            <div class="box-1">
                <div class="img-educated">
                    <img src="img/educated.png" alt="">
                </div>
                <p class="author">TARA WESTOVER</p>
                <p class="tittle">Educated (Terdidik): <br> Sebuah Memoar</p>
                <a href="" class="btn-1">Lihat</a></button>
            </div>
        </section>
    </div>

    {{-- panduan --}}
    <div class="modal" id="panduanModal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <h2>Panduan APlikasi Perpustakaan Digital</h2>
            <h4>Cara Menggunakan Website Role Peminjam (user)</h4>
            <ol>
                <li>Login atau Daftar Akun</li>
                <li>Cari Buku melalui kolom pencarian</li>
                <li>Pilih Buku Sesuai Kategori</li>
                <li>Klik Tombol Detail untuk Melihat Deskripsi Buku</li>
                <li>Klik Tombol Pinjam untuk Meminjam Buku</li>
                <li>Isi Form Peminjaman Sesuai Data Diri</li>
                <li>Klik Pinjam, Anda akan Menerima Struk Peminjaman</li>
                <li>Pergi Ke Perpustakaan untuk Memberi Bukti Peminjaman kepada Petugas</li>
                <li>Petugas akan Mengambil Buku yang Anda Pinjam sesuai Data yang ada di Struk Peminjaman</li>
            </ol>
        </div>
    </div>


    <style>
        .about {
            font-family: 'inter', sans-serif;
            margin-top: 190px;
        }

        .heading-content {
            text-align: center
        }

        .heading1 {
            background-color: #141B6F;
            width: 100%;
            height: 50px;
            position: absolute;
            z-index: 1;
            margin-top: -65px;
        }

    </style>
    <div class="about">
        <div class="heading-content">
            <h1>Mengapa Website ini Dibuat?</h1>
        </div>
        <section class="latarbelakang">
            <h1 style="z-index: 10; position:relative; text-align:end; margin-right:40px;margin-top:50px;color:white; text-transform:uppercase;">latar Belakang</h1>
            <div class="heading1"></div>
            <div class="content1" style="background-color: #1c2691;width:1000px;height:600px;margin: 0px auto;border-radius:10px;">
                <p style="width:60%; text-align:justify; margin: 0px auto; line-height:30px; font-style:italic; color:white;">Perkembangan teknologi informasi telah membawa perubahan besar dalam cara masyarakat mengakses dan
                    memperoleh informasi. Saat ini, kebutuhan akan sumber bacaan yang mudah diakses, cepat, dan efisien
                    menjadi semakin penting, terutama untuk mendukung kegiatan belajar serta meningkatkan minat baca di
                    berbagai kalangan.


                    Namun, apakah akses literasi saat ini sudah benar-benar mudah dan merata bagi semua kalangan?  Pada
                    kenyataannya, akses literasi belum sepenuhnya merata. Masih banyak masyarakat yang kesulitan
                    mendapatkan
                    buku karena keterbatasan lokasi, waktu, dan fasilitas. Oleh karena itu, diperlukan solusi berbasis
                    teknologi yang mampu menjembatani kesenjangan tersebut.
                    Perpustakaan digital hadir sebagai alternatif modern dalam menyediakan layanan literasi secara
                    daring
                    dengan memanfaatkan teknologi informasi.


                    Bagaimana jika membaca buku bisa dilakukan kapan saja tanpa harus datang ke perpustakaan fisik?
                    Dengan
                    perpustakaan digital, pengguna dapat mengakses buku kapan pun dan di mana pun selama terhubung
                    dengan
                    internet. Hal ini memberikan fleksibilitas dan kemudahan yang tidak dapat diperoleh dari
                    perpustakaan
                    konvensional.</p>
            </div>
        </section>

        <section class="masalah">
            <div class="heading2">
                <h1>Permasalahan Yang Ingin Diselesaikan</h1>
            </div>
            <div class="content2">
                <p>Kenapa sistem perpustakaan lama perlu diperbaiki?  Perpustakaan konvensional masih memiliki berbagai
                    keterbatasan, seperti jam operasional yang terbatas, pencarian buku yang kurang efisien, serta
                    keterbatasan jumlah koleksi fisik. Selain itu, pengelolaan data buku dan peminjaman sering kali
                    masih
                    dilakukan secara manual.


                    Apakah cara tersebut masih relevan di era digital saat ini?  Di era digital, metode manual sudah
                    kurang
                    efektif karena memakan waktu, berisiko terjadi kesalahan, dan tidak efisien dalam pengelolaan data.
                    Oleh
                    sebab itu, diperlukan sistem digital yang lebih modern dan terstruktur.
                    Tidak semua pengguna juga memiliki kesempatan untuk datang langsung ke perpustakaan karena faktor
                    jarak
                    dan waktu.


                    Lalu, bagaimana solusi agar akses buku tetap dapat dinikmati oleh semua orang?  Solusinya adalah
                    dengan
                    menghadirkan perpustakaan digital yang memungkinkan akses buku secara daring sehingga siapa pun
                    dapat
                    menikmati layanan literasi tanpa hambatan fisik.</p>
            </div>
        </section>

        <section class="tujuan-manfaat">
            <div class="heading3">
                <h1>Tujuan & Manfaat</h1>
            </div>
            <div class="content3">
                <p>Apa tujuan utama dari website perpustakaan digital ini?  Perpustakaan digital ini dibuat untuk
                    menyediakan akses buku digital yang mudah, cepat, dan terpusat. Sistem ini bertujuan mendukung
                    proses
                    pembelajaran serta meningkatkan budaya literasi berbasis teknologi.


                    Bagaimana jika satu platform dapat menjadi solusi untuk berbagai kebutuhan literasi?  Dengan satu
                    platform digital, pengguna tidak perlu berpindah-pindah tempat untuk mencari sumber bacaan. Semua
                    kebutuhan literasi dapat diakses dalam satu sistem yang terintegrasi.
                    Manfaat yang diharapkan antara lain:
                    Memudahkan pengguna dalam mencari dan mengakses buku
                    Menghemat waktu dan tenaga dalam memperoleh informasi
                    Mendukung pembelajaran mandiri secara digital


                    Bukankah kemudahan akses informasi dapat mendorong semangat belajar yang lebih tinggi?  Ya,
                    kemudahan
                    akses informasi dapat meningkatkan motivasi belajar karena pengguna dapat memperoleh bahan bacaan
                    dengan
                    cepat dan sesuai kebutuhan mereka.</p>
            </div>
        </section>

        <section class="konsep">
            <div class="heading4">
                <h1>Konsep & Cara Kerja Perpustakaan Digital</h1>
            </div>
            <div class="content4">
                <p>Bagaimana konsep kerja dari perpustakaan digital ini?  Perpustakaan digital ini dirancang sebagai
                    sistem
                    berbasis web yang memungkinkan pengguna untuk menjelajahi koleksi buku, melihat informasi detail,
                    serta
                    membaca buku secara daring.


                    Bagaimana jika seluruh koleksi buku dapat ditemukan hanya dengan beberapa klik?  Melalui fitur
                    pencarian
                    berdasarkan judul, penulis, dan kategori, pengguna dapat menemukan buku yang diinginkan dengan cepat
                    dan
                    efisien tanpa harus mencari secara manual.
                    Untuk membaca buku secara penuh, pengguna diwajibkan melakukan login. Sementara itu, pengelola
                    memiliki
                    akses khusus untuk mengelola data buku dan pengguna.


                    Apakah sistem yang terstruktur tidak akan membuat pengelolaan menjadi lebih efektif?  Sistem yang
                    terstruktur justru mempermudah pengelolaan karena data tersimpan rapi, aman, dan mudah diperbarui
                    kapan
                    saja.</p>
            </div>
        </section>

        <section class="nilai & prinsip">
            <div class="heading5">
                <h1>Nilai & Prinsip Yang Diterapkan</h1>
            </div>
            <div class="content5">
                <p>Nilai apa yang diterapkan dalam pengembangan sistem ini?  Perpustakaan digital ini dibangun dengan
                    mengedepankan nilai kemudahan, keterbukaan, dan kenyamanan pengguna. Setiap fitur dirancang agar
                    mudah
                    dipahami dan digunakan.


                    Bukankah sistem yang mudah digunakan akan lebih bermanfaat bagi banyak orang?  Sistem yang
                    user-friendly
                    memungkinkan semua kalangan, termasuk pemula, dapat menggunakan layanan tanpa kesulitan.
                    Selain itu, prinsip keberlanjutan juga diterapkan agar sistem dapat terus dikembangkan.


                    Bagaimana jika perpustakaan ini terus berkembang seiring kemajuan teknologi?  Dengan konsep
                    keberlanjutan, perpustakaan digital dapat terus menyesuaikan diri dengan kebutuhan pengguna dan
                    perkembangan teknologi di masa depan.</p>
            </div>
        </section>

        <section class="siapa">
            <div class="heading6">
                <h1>Siapa Yang Dapat Menggunakan</h1>
            </div>
            <div class="content6">
                <p>Siapa saja yang dapat memanfaatkan website ini?  Perpustakaan digital ini ditujukan bagi siswa, guru,
                    mahasiswa, serta masyarakat umum yang membutuhkan sumber bacaan dan referensi digital.


                    Siapa pun yang ingin belajar dan menambah wawasan, bukankah membutuhkan akses literasi yang mudah?
                    Akses literasi yang mudah merupakan kebutuhan semua orang, sehingga sistem ini dirancang agar dapat
                    digunakan oleh berbagai kalangan tanpa batasan.</p>
            </div>
        </section>

        <section class="dampak">
            <div class="heading7">
                <h1>Dampak Yang Diharapkan</h1>
            </div>
            <div class="content7">
                <p>Apa dampak yang ingin dicapai dari adanya perpustakaan digital ini?  Dengan adanya perpustakaan
                    digital,
                    diharapkan dapat meningkatkan minat baca, memperluas akses terhadap sumber informasi, serta
                    mendukung
                    pembelajaran berbasis teknologi.


                    Bagaimana jika budaya literasi dapat tumbuh lebih kuat melalui pemanfaatan teknologi digital?
                    Pemanfaatan teknologi digital memungkinkan literasi berkembang lebih luas dan menjangkau lebih
                    banyak
                    orang secara efektif.</p>
            </div>
        </section>

        <section class="komitmen pengelola">
            <div class="heading8">
                <h1>Komitmen Pengelola</h1>
            </div>
            <div class="content8">
                <p>Apa komitmen pengelola terhadap sistem ini?  Pengelola berkomitmen untuk menjaga kualitas sistem,
                    memperbarui koleksi buku secara berkala, serta memastikan layanan berjalan dengan baik.


                    Bukankah komitmen yang berkelanjutan akan menciptakan layanan perpustakaan digital yang lebih baik?
                    Dengan komitmen yang berkelanjutan, perpustakaan digital dapat terus berkembang, relevan, dan
                    memberikan
                    manfaat jangka panjang bagi penggunanya.</p>
            </div>
        </section>
    </div>

    <section class="section-stats">
        <div class="stats">

            <div class="stat-card">
                <div class="icon blue"></div>
                <div class="stat-content">
                    <span class="label">KOLEKSI BUKU</span>
                    <h2>1200</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="icon orange"></div>
                <div class="stat-content">
                    <span class="label">KATEGORI BUKU</span>
                    <h2>120</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="icon green"></div>
                <div class="stat-content">
                    <span class="label">PENGGUNA</span>
                    <h2>500</h2>
                </div>
            </div>

            <div class="stat-card center">
                <div class="icon red"></div>
                <div class="stat-content">
                    <span class="label">AKSES</span>
                    <h2>24</h2>
                    <small>Jam / Hari</small>
                </div>
            </div>

        </div>
    </section>



    <section class="section-fitur">
        <div class="fitur-unggulan">
            <h1>Fitur Unggulan</h1>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </section>


    <section class="section-alasan">
        <div class="alasan">
            <h1>Mengapa Memilih PustakaDigital?</h1>
            <img src="" alt="">
        </div>
    </section>

    {{-- footer --}}
    <footer class="footer">
        <div class="footer-container">

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
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Koleksi Buku</a></li>
                    <li><a href="#">Kategori</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#">Baca Online</a></li>
                    <li><a href="#">Unduh Buku</a></li>
                    <li><a href="#">Keanggotaan</a></li>
                    <li><a href="#">Bantuan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Kontak</h4>
                <p>Email: support@pustakadigital.id</p>
                <p>Tel: +62 821-2509-8439</p>
                <div class="socials">
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">LinkedIn</a>
                </div>
            </div>

        </div>
    </footer>

    {{-- script modal panduan --}}
    <script>
        const openBtn = document.getElementById('openPanduan');
        const modal = document.getElementById('panduanModal');
        const closeBtn = document.querySelector('.close');

        openBtn.onclick = () => modal.style.display = 'block';
        closeBtn.onclick = () => modal.style.display = 'none';

        window.onclick = (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        };
    </script>
</body>
</html>
