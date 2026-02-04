 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
 <style>
     * {
         box-sizing: border-box;
         font-family: 'Inter', sans-serif;
     }

     body {
         margin: 0;
         background: #f8fafc;
         display: flex;
         height: 100vh;
         color: #0f172a;
     }

     /* Sidebar */
     .sidebar {
         width: 260px;
         background: #ffffff;
         color: #0f172a;
         padding: 24px;
         border-right: 1px solid #e5e7eb;
     }

     .logo {
         height: 80px;
         display: flex;
         align-items: center;
         margin-bottom: 15px;
     }

     .logo img {
         max-width: 100%;
         width: auto;
     }

     /* .sidebar img {
         width: 400px;
         display: block;
         margin-bottom: 30px;
     } */

     .sidebar a {
         text-decoration: none;
         color: #475569;
         padding: 12px 14px;
         border-radius: 10px;
         margin-bottom: 8px;
         display: block;
         transition: background 0.2s, color 0.2s;
     }

     .sidebar a:hover {
         background: #eff6ff;
         color: #2563eb;
     }

     .sidebar a.active {
         background: #2563eb;
         color: #ffffff;
     }

     .sidebar i {
         width: 20px;
         margin-right: 8px;
     }


     /* Main */
     .main {
         flex: 1;
         display: flex;
         flex-direction: column;
     }

     /* Navbar */
     .navbar {
         height: 70px;
         background: #ffffff;
         display: flex;
         align-items: center;
         justify-content: space-between;
         padding: 0 30px;
         border-bottom: 1px solid #e5e7eb;
     }

     .navbar h3 {
         margin: 0;
         font-weight: 600;
         color: #2563eb;
     }

     .navbar .admin {
         font-size: 14px;
         color: #64748b;
     }

     /* Content */
     .content {
         padding: 30px;
         overflow-y: auto;
     }

     /* Cards */
     .cards {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
         gap: 20px;
         margin-bottom: 30px;
     }

     .card {
         background: #ffffff;
         padding: 24px;
         border-radius: 16px;
         border: 1px solid #e5e7eb;
     }

     .card h4 {
         margin: 0;
         font-size: 14px;
         color: #64748b;
     }

     .card span {
         font-size: 30px;
         font-weight: 700;
         color: #2563eb;
     }

     /* Table */
     .table {
         background: #ffffff;
         border-radius: 16px;
         padding: 24px;
         border: 1px solid #e5e7eb;
     }

     .table h4 {
         margin-bottom: 16px;
         color: #2563eb;
     }

     table {
         width: 100%;
         border-collapse: collapse;
         font-size: 14px;
     }

     table th,
     table td {
         padding: 12px;
         border-bottom: 1px solid #e5e7eb;
     }

     table th {
         color: #475569;
         font-weight: 600;
     }

     /* Dropdown Sidebar */
     .menu-dropdown {
         display: flex;
         flex-direction: column;
     }

     .dropdown-btn {
         background: none;
         border: none;
         color: #475569;
         padding: 12px 14px;
         text-align: left;
         font-size: 14px;
         font-weight: 500;
         border-radius: 10px;
         cursor: pointer;
         display: flex;
         justify-content: space-between;
         align-items: center;
     }

     .dropdown-btn:hover {
         color: #2563eb;
         background: #eff6ff;
         transition: background 0.2s, color 0.2s;
     }

     .dropdown-content {
         max-height: 0;
         overflow: hidden;
         opacity: 0;
         transform: translateY(-5px);
         transition: max-height 0.3s ease,
             opacity 0.3s ease,
             transform 0.3s ease;
         flex-direction: column;
         padding-left: 10px;
     }

     .dropdown-content a {
         font-size: 13px;
         padding: 10px 14px;
         border-radius: 8px;
         color: #475569;
     }

     .dropdown-content a:hover {
         color: #2563eb;
         background: #eff6ff;
         transition: background 0.2s, color 0.2s;
     }

     /* Active dropdown */
     .menu-dropdown.active .dropdown-content {
         max-height: 300px;
         /* sesuaikan jika item lebih banyak */
         opacity: 1;
         transform: translateY(0);
     }

     .arrow {
         transition: transform 0.3s ease;
     }

     .menu-dropdown.active .arrow {
         transform: rotate(180deg);
     }

     .logout a:hover {
         color: #eb2525;
     }


     /* Dropdown kedua: Pengguna */
     .pengguna-dropdown {
         display: flex;
         flex-direction: column;
     }

     .pengguna-btn {
         background: none;
         border: none;
         color: #475569;
         padding: 10px 14px;
         text-align: left;
         font-size: 13px;
         border-radius: 8px;
         cursor: pointer;
         display: flex;
         justify-content: space-between;
         align-items: center;
     }

     .pengguna-btn:hover {
         background: #eff6ff;
         color: #2563eb;
     }

     .pengguna-content {
         max-height: 0;
         overflow: hidden;
         opacity: 0;
         transform: translateY(-5px);
         transition: 0.3s;
         padding-left: 10px;
     }

     .pengguna-content a {
         font-size: 13px;
         padding: 10px 14px;
         border-radius: 8px;
     }

     .pengguna-dropdown.active .pengguna-content {
         max-height: 200px;
         opacity: 1;
         transform: translateY(0);
     }

     .arrow2 {
         transition: transform 0.3s ease;
     }

     .pengguna-dropdown.active .arrow2 {
         transform: rotate(180deg);
     }

     .profile-card {
         text-align: center;
         margin-bottom: 20px;
     }

     /* ======================
   SIDEBAR HEADER
====================== */
     .sidebar-header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 20px;
     }

     .brand {
         display: flex;
         align-items: center;
         gap: 8px;
     }

     .brand img {
         width: 40px;
         height: 40px;
     }

     .brand span {
         font-weight: 700;
         font-size: 18px;
     }

     .menu-toggle {
         font-size: 18px;
         cursor: pointer;
         color: #475569;
     }

     /* ======================
   PROFILE CARD
====================== */
     .profile-card {
         text-align: center;
         margin-bottom: 25px;
     }

     .profile-avatar {
         position: relative;
         width: 95px;
         height: 95px;
         margin: auto;
         margin-bottom: 10px;
     }

     .profile-avatar img {
         width: 100%;
         height: 100%;
         border-radius: 50%;
         object-fit: cover;
         background: #e2e8f0;
         object-position: 50% 80%;
     }

     /* Badge NEW */
     .badge {
         position: absolute;
         bottom: -6px;
         left: 50%;
         transform: translateX(-50%);
         background: #22c55e;
         color: white;
         font-size: 11px;
         padding: 2px 10px;
         border-radius: 12px;
     }

     /* Icon Setting */
     .profile-setting {
         position: absolute;
         right: -55px;
         top: 10%;
         transform: translateY(-50%);
         background: #e2e8f0;
         width: 34px;
         height: 34px;
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         cursor: pointer;
         transition: 0.2s;
     }

     .profile-setting:hover {
         background: #cbd5f5;
     }

     .profile-setting i {
         font-size: 14px;
         margin-left: 5px;
     }

     /* Nama */
     .profile-card h4 {
         margin: 6px 0 2px;
         font-size: 15px;
         font-weight: 600;
     }

     /* Jabatan */
     .profile-card p {
         margin: 0;
         font-size: 12px;
         color: #64748b;
     }

     /* Statistik */
     .profile-stats {
         display: flex;
         justify-content: space-between;
         margin-top: 18px;
         border-top: 1px solid #e5e7eb;
         padding-top: 12px;
         gap: 8px;
     }

     .profile-stats div {
         flex: 1;
         text-align: center;
         padding: 6px 4px;
     }

     .profile-stats strong {
         display: block;
         font-size: 15px;
         font-weight: 700;
         color: #0f172a;
         margin-bottom: 2px;
     }

     .profile-stats span {
         font-size: 11px;
         color: #64748b;
         white-space: nowrap;
         margin-left: -10px;
     }
 </style>
 <aside class="sidebar">


     <!-- HEADER SIDEBAR -->
     <div class="sidebar-header">
         <div class="brand">
             <img src="{{ asset('img/logo pustakadigital - Copy.png') }}" alt="">
             <span style="color: #003A9B">Pustaka<span style="color: #0278F3">Digital</span></span>
         </div>

         <i class="fa fa-bars menu-toggle"></i>
     </div>
     <!-- PROFILE -->
     <div class="profile-card">
         <div class="profile-avatar">
             <img src="{{ asset('img/WhatsApp Image 2026-02-04 at 09.32.43.jpeg') }}" alt="">
             <span class="badge">New</span>

             <!-- ICON SETTING -->
             <div class="profile-setting">
                 <i class="fa fa-gear"></i>
             </div>
         </div>

         <h4>Andhika</h4>
         <p>Admin Pustaka Digital</p>

         <div class="profile-stats">
             <div>
                 <strong>19.8k</strong>
                 <span>user Aktif</span>
             </div>
             <div>
                 <strong>2 year</strong>
                 <span>Pinjam Hari Ini</span>
             </div>
             <div>
                 <strong>95.2k</strong>
                 <span>Pengembalian</span>
             </div>
         </div>
     </div>


     <hr>

     <a href="{{ route('admin/dashboard') }}" class="active"><i class="fa fa-home"></i>Dashboard</a>

     <!-- MASTER DATA -->
     <div class="menu-dropdown">
         <button class="dropdown-btn">
             <span>
                 <i class="fa fa-database"></i>Master Data
             </span>
             <span class="arrow">▾</span>
         </button>

         <div class="dropdown-content">
             <div class="pengguna-dropdown">
                 <button class="pengguna-btn">
                     <span>
                         <i class="fa fa-users"></i>Data Pengguna
                     </span>
                     <span class="arrow2">▾</span>
                 </button>

                 <div class="pengguna-content">
                     <a href="#" style="color: #7e8a9b"><i class="fa fa-user-shield"></i>Admin</a>
                     <a href="{{ route('admin/dataPengguna/petugas/index') }}" style="color: #7e8a9b"><i
                             class="fa fa-user-tie"></i>Petugas</a>
                     <a href="{{ route('admin/dataPengguna/peminjam/index') }}" style="color: #7e8a9b"><i class="fa fa-user"></i>Peminjam</a>
                 </div>
             </div>
             <a href="#"><i class="fa fa-tags"></i>Data Kategori</a>
             <a href="#"><i class="fa fa-book"></i>Data Buku</a>
         </div>
     </div>

     <a href="#"><i class="fa fa-book-reader"></i>Peminjaman</a>
     <a href="#"><i class="fa fa-rotate-left"></i>Pengembalian</a>
     <a href="#"><i class="fa fa-chart-bar"></i>Laporan</a>
     {{-- <div class="logout">
         <a href="#"><i class="fa fa-right-from-bracket"></i>Logout</a>
     </div> --}}
 </aside>


 <script>
     const dropdownBtn = document.querySelector('.dropdown-btn');
     const menuDropdown = document.querySelector('.menu-dropdown');

     dropdownBtn.addEventListener('click', () => {
         menuDropdown.classList.toggle('active');
     });

     // Dropdown pengguna
     const penggunaBtn = document.querySelector('.pengguna-btn');
     const penggunaDropdown = document.querySelector('.pengguna-dropdown');

     penggunaBtn.addEventListener('click', () => {
         penggunaDropdown.classList.toggle('active');
     });
 </script>
