<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="css/petugas_style.css">
<style>
    :root {
        --primary-color: #1e40af;
        --secondary-color: #3b82f6;
        --accent-color: #f59e0b;
        --text-light: #ffffff;
        --text-dark: #1f2937;
        --bg-light: #f8fafc;
        --bg-card: #ffffff;
        --border-color: #e5e7eb;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        display: flex;
        background: var(--bg-light);
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
        width: 250px;
        height: 90vh;
        border-radius: 20px;
        margin-top: 20px;
        margin-left: 20px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 25px;
        position: fixed;
        color: var(--text-light);
        box-shadow: var(--shadow);
        transition: var(--transition);
        overflow-y: auto;
    }

    .sidebar h2 {
        margin-bottom: 40px;
        font-size: 24px;
        font-weight: 700;
        text-align: center;
        color: var(--text-light);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .sidebar a {
        display: flex;
        align-items: center;
        color: var(--text-light);
        text-decoration: none;
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 10px;
        font-size: 15px;
        font-weight: 500;
        transition: var(--transition);
        gap: 12px;
        position: relative;
    }

    .sidebar .badge-count {
        margin-left: auto;
        background: rgba(255, 255, 255, 0.18);
        color: #ffffff;
        border-radius: 999px;
        padding: 2px 10px;
        font-size: 11px;
        font-weight: 700;
    }

    .sidebar a:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .sidebar a.active {
        background: rgba(255, 255, 255, 0.2);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar a i {
        font-size: 18px;
        width: 20px;
        text-align: center;
    }

    /* Dropdown styles */
    .menu-dropdown {
        margin-bottom: 10px;
    }

    .dropdown-btn {
        width: 100%;
        background: none;
        border: none;
        color: var(--text-light);
        padding: 15px 20px;
        text-align: left;
        font-size: 15px;
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 500;
        transition: var(--transition);
        gap: 12px;
    }

    .dropdown-btn:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(5px);
    }

    .dropdown-btn.active {
        background: rgba(255, 255, 255, 0.2);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .dropdown-btn i {
        font-size: 18px;
        width: 20px;
    }

    .dropdown-content {
        display: none;
        padding-left: 20px;
        margin-top: 5px;
    }

    .dropdown-content a {
        font-size: 14px;
        padding: 10px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        margin-bottom: 5px;
        transition: var(--transition);
    }

    .dropdown-content a:hover {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text-light);
    }

    .menu-dropdown.active .dropdown-content {
        display: block;
    }

    .arrow {
        font-size: 14px;
        transition: var(--transition);
    }

    .menu-dropdown.active .arrow {
        transform: rotate(180deg);
    }

    /* ===== CONTENT ===== */
    .main {
        margin-left: 270px;
        width: 100%;
        transition: var(--transition);
    }

    .main.full {
        margin-left: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            z-index: 1000;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .main {
            margin-left: 0;
        }
    }

    /* Sidebar hide animation */
    .sidebar.hide {
        transform: translateX(-260px);
    }
</style>
</style>
@php
    $petugasMessagesCount = \App\Models\Message::where('recipient', 'petugas')->count();
    $petugasReviewCount = \App\Models\Review::count();
@endphp
<!-- Sidebar -->
<div class="sidebar">
    <h2><i class="fa fa-book-open"></i> PustakaDigital</h2>

    <a href="{{ url('/petugas/dashboard') }}" class="{{ request()->is('petugas/dashboard') ? 'active' : '' }}"><i class="fa fa-home"></i> Dashboard</a>

    <!-- Master Data Dropdown -->
    <div class="menu-dropdown {{ request()->is('petugas/dataBuku*') || request()->is('petugas/kategori*') ? 'active' : '' }}">
        <button class="dropdown-btn">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="arrow">▾</span>
        </button>

        <div class="dropdown-content">
            <a href="{{ url('petugas/dataBuku') }}" class="{{ request()->is('petugas/dataBuku*') ? 'active' : '' }}"><i class="fa fa-book"></i> Data Buku</a>
            <a href="{{ route('petugas.dataKategori.index') }}" class="{{ request()->is('petugas/kategori*') ? 'active' : '' }}"><i class="fa fa-tags"></i> Data Kategori</a>
        </div>
    </div>

    <a href="{{ route('petugas.peminjaman.index') }}" class="{{ request()->is('petugas/peminjaman*') ? 'active' : '' }}"><i class="fa fa-arrow-right-arrow-left"></i> Peminjaman</a>
    <a href="{{ route('petugas.pengembalian.index') }}" class="{{ request()->is('petugas/pengembalian*') ? 'active' : '' }}"><i class="fa fa-rotate-left"></i> Pengembalian</a>
    <a href="{{ route('petugas.messages.index') }}" class="{{ request()->is('petugas/messages*') ? 'active' : '' }}"><i class="fa fa-envelope"></i> Pesan <span class="badge-count">{{ $petugasMessagesCount }}</span></a>
    <a href="{{ route('petugas.reviews.index') }}" class="{{ request()->is('petugas/reviews*') ? 'active' : '' }}"><i class="fa fa-star"></i> Ulasan <span class="badge-count">{{ $petugasReviewCount }}</span></a>
    <a href="{{ route('petugas.laporan.index') }}" class="{{ request()->is('petugas/laporan*') ? 'active' : '' }}"><i class="fa fa-file-alt"></i> Laporan</a>
    <a href="{{ route('staff.logout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<script>
    // Dropdown toggle
    document.querySelectorAll('.dropdown-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.parentElement.classList.toggle('active');
        });
    });

    // Auto-expand dropdown if child is active
    document.addEventListener('DOMContentLoaded', function() {
        const activeDropdownItems = document.querySelectorAll('.dropdown-content a.active');
        activeDropdownItems.forEach(item => {
            const dropdown = item.closest('.menu-dropdown');
            if (dropdown) {
                dropdown.classList.add('active');
            }
        });
    });
</script>
