<style>
    .logout a {
        text-decoration: none;
        color: #2563eb;
        background: #eff6ff;
        padding: 10px;
        border-radius: 30px;
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

<div class="main">
    <div class="navbar">
        <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Cari Sesuatu....">
        </div>

        <!-- PESAN -->
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

        <div class="logout">
            <a href="#"><i class="fa fa-right-from-bracket"></i> Logout</a>
        </div>
    </div>


    <script>
        document.querySelectorAll('.nav-trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                this.parentElement.classList.toggle('active');
            });
        });
    </script>
