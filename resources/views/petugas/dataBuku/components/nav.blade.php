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
    }

    .sidebar h2 {
        margin-bottom: 40px;
        font-size: 22px;
        font-weight: 700;
        text-align: center;
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
    }

    .sidebar a:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(5px);
    }

    .sidebar a i {
        font-size: 18px;
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

    .header {
        padding: 25px 40px;
        margin-top: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        justify-content: space-between;
        background: var(--bg-card);
        border-radius: 15px;
        margin-right: 20px;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .header h3 {
        font-weight: 700;
        color: var(--text-dark);
    }

    .hamburger {
        font-size: 24px;
        cursor: pointer;
        color: var(--primary-color);
        transition: var(--transition);
    }

    .hamburger:hover {
        color: var(--secondary-color);
        transform: scale(1.1);
    }

    .search {
        position: relative;
        flex: 1;
        max-width: 400px;
    }

    .search input {
        width: 100%;
        padding: 12px 16px 12px 45px;
        border-radius: 25px;
        border: 2px solid var(--border-color);
        outline: none;
        background: var(--bg-light);
        transition: var(--transition);
        font-size: 16px;
        color: var(--text-dark);
    }

    .search i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 16px;
    }

    .search input:focus {
        border-color: var(--secondary-color);
        background: var(--bg-card);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }

    .search input:hover {
        border-color: var(--secondary-color);
    }

    .nav-dropdown {
        position: relative;
        cursor: pointer;
    }

    .nav-trigger {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--text-dark);
        padding: 10px 15px;
        border-radius: 10px;
        transition: var(--transition);
        font-weight: 500;
    }

    .nav-trigger:hover {
        background: var(--bg-light);
    }

    .nav-trigger i {
        font-size: 18px;
        color: var(--primary-color);
    }

    .arrow {
        font-size: 14px;
        transition: var(--transition);
    }

    .nav-dropdown.active .arrow {
        transform: rotate(180deg);
    }

    .nav-menu {
        position: absolute;
        top: 50px;
        right: 0;
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        min-width: 200px;
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transform: translateY(-10px);
        transition: var(--transition);
        box-shadow: var(--shadow);
        z-index: 1000;
    }

    .nav-menu a {
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-dark);
        display: block;
        transition: var(--transition);
        font-size: 14px;
    }

    .nav-menu a:hover {
        background: var(--bg-light);
        color: var(--secondary-color);
    }

    .nav-dropdown.active .nav-menu {
        max-height: 300px;
        opacity: 1;
        transform: translateY(0);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 15px;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 12px;
        transition: var(--transition);
    }

    .user-profile:hover {
        background: var(--bg-light);
    }

    .user-profile img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--secondary-color);
    }

    .user-info {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
    }

    .user-profile-trigger {
        display: flex;
        align-items: center;
        gap: 15px;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 12px;
        transition: var(--transition);
        font-weight: 500;
        color: var(--text-dark);
    }

    .user-profile-trigger:hover {
        background: var(--bg-light);
    }

    .user-profile-trigger img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--secondary-color);
    }

    .user-profile-trigger .user-info {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
    }

    .user-profile-trigger .user-info .name {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .user-profile-trigger .user-info .role {
        font-size: 13px;
        color: #6b7280;
        font-weight: 400;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .main {
            margin-left: 0;
        }

        .header {
            flex-wrap: wrap;
            gap: 15px;
        }

        .search {
            order: 3;
            width: 100%;
            max-width: none;
        }

        .nav-dropdown {
            display: none;
        }
    }

    /* Sidebar hide animation */
    .sidebar.hide {
        transform: translateX(-260px);
    }
</style>
</style>
<div class="header">
    <div class="hamburger" id="hamburger">
        <i class="fa fa-bars"></i>
    </div>

    <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" placeholder="Search">
    </div>
    <div class="nav-dropdown">
        <div class="nav-trigger">
            <!-- <i class="fa-solid fa-envelope"></i> -->
            <!-- <span>Pesan</span>
            <i class="fa fa-chevron-down arrow"></i> -->
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
            <!-- <i class="fa fa-bell"></i>
            <span>Notif</span>
            <i class="fa fa-chevron-down arrow"></i> -->
        </div>
        <div class="nav-menu">
            <a href="#">Buku dikembalikan</a>
            <a href="#">User baru daftar</a>
            <a href="#">Lihat semua notif</a>
        </div>
    </div>
    <!-- <div class="user-profile">
        <img src="{{ asset('img/WhatsApp Image 2026-02-04 at 09.32.43.jpeg') }}" alt="">
        <div class="user-info">
            <span class="name">{{ session('staff_username') }}</span>
            <span class="role">Petugas</span>
        </div>
    </div> -->

    <!-- USER PROFILE DROPDOWN -->
    <div class="nav-dropdown">
        <div class="nav-trigger user-profile-trigger">
            <img src="{{ asset('img/WhatsApp Image 2026-02-04 at 09.32.43.jpeg') }}" alt="">
            <div class="user-info">
                <span class="name">{{ session('staff_username') }}</span>
                <span class="role">Petugas</span>
            </div>
            <i class="fa fa-chevron-down arrow"></i>
        </div>
        <div class="nav-menu">
            <a href="{{ route('petugas.settings') }}"><i class="fa fa-cog"></i> Pengaturan</a>
            <a href="{{ route('staff.logout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

</div>
<script src="js/petugas.js"></script>
