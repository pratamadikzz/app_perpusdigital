<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link rel="stylesheet" href="css/petugas_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #1e40af;
            --secondary-color: #3b82f6;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --text-light: #ffffff;
            --text-dark: #1f2937;
            --bg-light: #f8fafc;
            --bg-card: #ffffff;
            --border-color: #e5e7eb;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s ease;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: var(--bg-light);
        }

        .content {
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .welcome-section h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .welcome-section p {
            font-size: 16px;
            opacity: 0.9;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .card {
            background: var(--bg-card);
            padding: 25px;
            border-radius: 15px;
            border: none;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--secondary-color);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
        }

        .card:nth-child(1)::before {
            background: var(--primary-color);
        }

        .card:nth-child(2)::before {
            background: var(--success-color);
        }

        .card:nth-child(3)::before {
            background: var(--warning-color);
        }

        .card:nth-child(4)::before {
            background: var(--danger-color);
        }

        .card .icon {
            font-size: 32px;
            color: var(--secondary-color);
            margin-bottom: 15px;
            display: block;
        }

        .card h4 {
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card .number {
            font-size: 36px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .recent-activity {
            background: var(--bg-card);
            padding: 25px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .recent-activity h3 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .activity-list {
            list-style: none;
            padding: 0;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item i {
            font-size: 18px;
            color: var(--secondary-color);
            margin-right: 15px;
            width: 20px;
        }

        .activity-item .details {
            flex: 1;
        }

        .activity-item .title {
            font-weight: 500;
            color: var(--text-dark);
        }

        .activity-item .subtitle {
            font-size: 12px;
            color: #6b7280;
        }

        .activity-item .time {
            font-size: 12px;
            color: #9ca3af;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .action-card {
            background: var(--bg-card);
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            text-decoration: none;
            color: var(--text-dark);
            display: block;
        }

        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px -5px rgba(0, 0, 0, 0.1);
            color: var(--text-dark);
        }

        .action-card i {
            font-size: 24px;
            color: var(--secondary-color);
            margin-bottom: 10px;
            display: block;
        }

        .action-card h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .action-card p {
            font-size: 14px;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .welcome-section {
                padding: 20px;
            }

            .welcome-section h1 {
                font-size: 24px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @include('petugas.dataBuku.components.sidebar')
    <!-- Main Content -->
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content">

            <div class="welcome-section">
                <h1>Selamat Datang, {{ session('staff_username') }}!</h1>
                <p>Kelola perpustakaan digital dengan mudah dan efisien.</p>
            </div>

            <div class="cards">

                <div class="card">
                    <i class="fa fa-book icon"></i>
                    <h4>Total Buku</h4>
                    <div class="number">{{ $totalBuku }}</div>
                </div>

                <div class="card">
                    <i class="fa fa-users icon"></i>
                    <h4>Total Anggota</h4>
                    <div class="number">{{ $totalAnggota }}</div>
                </div>

                <div class="card">
                    <i class="fa fa-book-open icon"></i>
                    <h4>Buku Dipinjam</h4>
                    <div class="number">{{ $bukuDipinjam }}</div>
                </div>

                <div class="card">
                    <i class="fa fa-clock icon"></i>
                    <h4>Terlambat</h4>
                    <div class="number">{{ $terlambat }}</div>
                </div>

            </div>

            <div class="recent-activity">
                <h3>Aktivitas Terbaru</h3>
                <ul class="activity-list">
                    <li class="activity-item">
                        <i class="fa fa-book"></i>
                        <div class="details">
                            <div class="title">Buku "Laravel Guide" dipinjam</div>
                            <div class="subtitle">Oleh: Ahmad Surya</div>
                        </div>
                        <div class="time">2 jam lalu</div>
                    </li>
                    <li class="activity-item">
                        <i class="fa fa-user-plus"></i>
                        <div class="details">
                            <div class="title">Anggota baru bergabung</div>
                            <div class="subtitle">Nama: Sari Indah</div>
                        </div>
                        <div class="time">4 jam lalu</div>
                    </li>
                    <li class="activity-item">
                        <i class="fa fa-undo"></i>
                        <div class="details">
                            <div class="title">Buku dikembalikan</div>
                            <div class="subtitle">Judul: PHP Programming</div>
                        </div>
                        <div class="time">6 jam lalu</div>
                    </li>
                </ul>
            </div>

            <div class="quick-actions">
                <a href="{{ route('petugas.peminjaman.index') }}" class="action-card">
                    <i class="fa fa-plus"></i>
                    <h4>Tambah Peminjaman</h4>
                    <p>Kelola peminjaman buku baru</p>
                </a>
                <a href="{{ route('petugas.pengembalian.index') }}" class="action-card">
                    <i class="fa fa-undo"></i>
                    <h4>Proses Pengembalian</h4>
                    <p>Konfirmasi pengembalian buku</p>
                </a>
                <a href="{{ url('petugas/dataBuku') }}" class="action-card">
                    <i class="fa fa-book"></i>
                    <h4>Kelola Buku</h4>
                    <p>Tambah atau edit data buku</p>
                </a>
                <a href="#" class="action-card">
                    <i class="fa fa-chart-bar"></i>
                    <h4>Laporan</h4>
                    <p>Lihat laporan statistik</p>
                </a>
            </div>

        </div>

    </div>

    <script>
        //sidebar
        const hamburger = document.getElementById("hamburger");
        const sidebar = document.querySelector(".sidebar");
        const main = document.querySelector(".main");

        hamburger.onclick = function() {
            sidebar.classList.toggle("hide");
            main.classList.toggle("full");
        };

        //dropdown btn
        document.querySelector(".dropdown-btn").onclick = function() {
            this.parentElement.classList.toggle("active");
        };

        //navbar
        document.querySelectorAll(".nav-trigger").forEach((trigger) => {
            trigger.addEventListener("click", function() {
                this.parentElement.classList.toggle("active");
            });
        });
    </script>


</body>

</html>
