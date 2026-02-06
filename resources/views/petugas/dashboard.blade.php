<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            background: #f1f5f9;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 230px;
            height: 90vh;
            border-radius: 30px;
            margin-top: 40px;
            margin-left: 20px;
            background: #2563eb;
            padding: 20px;
            position: fixed;
            color: white;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ===== CONTENT ===== */
        .main {
            margin-left: 230px;
            width: 100%;
        }

        .header {
            padding: 20px 30px;
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .header h3 {
            font-weight: 600;
        }

        .profile {
            position: relative;
            width: 95px;
            height: 95px;
            margin: auto;
            margin-bottom: 10px;
        }

        .profil img {
            position: absolute;
            margin-left: -40px;
            margin-top: -10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid black;
            object-fit: cover;
            background: #e2e8f0;
            object-position: 50% 80%;
        }

        .profil-name {
            position:absolute;
            margin-left: 850px;
        }

        .content {
            padding: 30px;
        }

        /* ===== CARD DASHBOARD ===== */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
        }

        .card h4 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card .number {
            font-size: 26px;
            font-weight: 600;
        }

        .icon {
            float: right;
            font-size: 24px;
            color: #2563eb;
        }

        .search {
            position: relative;
        }

        .search input {
            width: 260px;
            padding: 10px 14px 10px 38px;
            border-radius: 30px;
            border: 1px solid #e5e7eb;
            outline: none;
            background: #f8fafc;
            transition: 0.25s;
            font-size: 14px;
        }

        /* icon di dalam input */
        .search i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
        }

        /* efek focus */
        .search input:focus {
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        /* hover */
        .search input:hover {
            border-color: #cbd5f5;
        }

        /* Dropdown */
        .menu-dropdown {
            margin-bottom: 8px;
        }

        .dropdown-btn {
            width: 100%;
            background: none;
            border: none;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
        }

        .dropdown-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .dropdown-content {
            display: none;
            padding-left: 10px;
        }

        .dropdown-content a {
            font-size: 13px;
            padding: 10px;
            display: block;
            color: #aabbd3;
        }

        .menu-dropdown.active .dropdown-content {
            display: block;
        }

        .nav-dropdown {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }

        .nav-trigger {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #475569;
        }

        /* Arrow animasi */
        .arrow {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        /* rotate saat aktif */
        .nav-dropdown.active .arrow {
            transform: rotate(180deg);
        }

        /* Dropdown menu */
        .nav-menu {
            position: absolute;
            top: 40px;
            right: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            min-width: 180px;

            /* animasi */
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transform: translateY(-10px);
            transition:
                max-height 0.3s ease,
                opacity 0.3s ease,
                transform 0.3s ease;

            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .nav-menu a {
            padding: 10px;
            text-decoration: none;
            color: #475569;
        }

        .nav-menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        /* aktif */
        .nav-dropdown.active .nav-menu {
            max-height: 300px;
            opacity: 1;
            transform: translateY(0);
        }
    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>PustakaDigital</h2>

        <a href="#"><i class="fa fa-home"></i> Dashboard</a>

        <!-- Master Data Dropdown -->
        <div class="menu-dropdown">
            <button class="dropdown-btn">
                <span><i class="fa fa-database"></i> Master Data</span>
                <span class="arrow">▾</span>
            </button>

            <div class="dropdown-content">
                <a href="#"><i class="fa fa-book"></i> Data Buku</a>
                <a href="#"><i class="fa fa-tags"></i> Data Kategori</a>
            </div>
        </div>

        <a href="#"><i class="fa fa-arrow-right-arrow-left"></i> Peminjaman</a>
        <a href="#"><i class="fa fa-rotate-left"></i> Pengembalian</a>
        <a href="#"><i class="fa fa-file"></i> Laporan</a>
        <a href="#"><i class="fa fa-right-from-bracket"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main">

        <div class="header">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search">
            </div>
            <div class="nav-dropdown">
                <div class="nav-trigger">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Pesan</span>
                    <i class="fa fa-chevron-down arrow"></i>
                </div>
                <div class="nav-menu">
                    <a href="#">Pesan dari Andi</a>
                    <a href="#">Pesan dari Admin</a>
                    <a href="#">Lihat semua pesan</a>
                </div>
            </div>

            <!-- NOTIF -->
            <div class="nav-dropdown">
                <div class="nav-trigger">
                    <i class="fa fa-bell"></i>
                    <span>Notif</span>
                    <i class="fa fa-chevron-down arrow"></i>
                </div>
                <div class="nav-menu">
                    <a href="#">Buku dikembalikan</a>
                    <a href="#">User baru daftar</a>
                    <a href="#">Lihat semua notif</a>
                </div>
            </div>
            <div class="profil-name">
                <span>Halo, Dhika</span>
                <br>
                <span>Petugas</span>
            </div>
            <div class="profil">
                <img src="{{ asset('img/WhatsApp Image 2026-02-04 at 09.32.43.jpeg') }}" alt="">
            </div>
        </div>

        <div class="content">

            <div class="cards">

                <div class="card">
                    <i class="fa fa-book icon"></i>
                    <h4>Total Buku</h4>
                    <div class="number">1,245</div>
                </div>

                <div class="card">
                    <i class="fa fa-users icon"></i>
                    <h4>Total Anggota</h4>
                    <div class="number">340</div>
                </div>

                <div class="card">
                    <i class="fa fa-book-open icon"></i>
                    <h4>Buku Dipinjam</h4>
                    <div class="number">89</div>
                </div>

                <div class="card">
                    <i class="fa fa-clock icon"></i>
                    <h4>Terlambat</h4>
                    <div class="number">12</div>
                </div>

            </div>

        </div>

    </div>


    <script>
        document.querySelector(".dropdown-btn").onclick = function() {
            this.parentElement.classList.toggle("active");
        };
    </script>

    <script>
        document.querySelectorAll('.nav-trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                this.parentElement.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
