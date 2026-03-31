<style>
    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .logo img {
        width: 40px;
        height: 40px;
    }

    .logo span {
        font-weight: 700;
        font-size: 18px;
    }
</style>

<header class="header">
    <div class="header-top">

        <!-- Logo + Kategori -->
        <div class="left">
            <div class="logo"> <img src="{{ asset('img/logo pustakadigital - Copy.png') }}" alt="">
             <span style="color: #003A9B">Pustaka<span style="color: #0278F3">Digital</span></span></div>

            <div class="kategori-wrapper" id="kategoriWrapper">
                <button class="kategori-btn" id="kategoriBtn">Kategori ▾</button>

                <div class="mega-menu" id="megaMenu">
                    <!-- KIRI -->
                    <div class="mega-left">
                        <button class="tab active" data-tab="buku">Buku</button>
                        <button class="tab" data-tab="digital">Digital Media</button>

                        <ul class="sub-list" id="subList">
                            <li>Ebook</li>
                            <li>International Books</li>
                            <li>Majalah Digital</li>
                        </ul>
                    </div>


                    <!-- TENGAH -->
                    <div class="mega-column">
                        <h4>Agama</h4>
                        <a href="#">Buddha</a>
                        <a href="#">Hindu</a>
                        <a href="#">Islam</a>
                        <a href="#" class="active">Konfusianisme</a>
                        <a href="#">Kristen & Katolik</a>
                        <a href="#">Spiritualitas</a>

                        <h4>Alam</h4>
                        <a href="#">Hewan</a>
                    </div>

                    <!-- KANAN -->
                    <div class="mega-column">
                        <h4>Komputer</h4>
                        <a href="#">Aplikasi Bisnis & Produktivitas</a>
                        <a href="#">Aplikasi Matematika & Statistik</a>
                        <a href="#">Database & Manajemen</a>
                        <a href="#">Desain, Grafik & Media</a>
                        <a href="#">Hacking</a>
                        <a href="#">Pemrograman</a>
                        <a href="#">Jaringan</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Search -->
        <div class="search">
            <input type="text" placeholder="Cari buku, judul, atau penulis...">
        </div>

        <!-- Icon Menu -->
        <div class="icon-menu">
            <a href="{{ route('favorit.index') }}" title="Favorit">
                <i data-lucide="heart"></i>
            </a>
            <a href="#" title="Koleksi Buku">
                <i data-lucide="book-open"></i>
            </a>
            <a href="#" title="Ulasan Buku">
                <i data-lucide="message-square"></i>
            </a>
            <a href="{{ route('peminjam.riwayat') }}" title="Riwayat">
                <i data-lucide="history"></i>
            </a>
        </div>


    </div>
</header>
