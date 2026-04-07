<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Laporan - PustakaDigital</title>
    <style>
        .content {
            margin-left: 300px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
        }

        .btn {
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .border-left-primary {
            border-left: 4px solid #4e73df !important;
        }

        .border-left-success {
            border-left: 4px solid #1cc88a !important;
        }

        .border-left-info {
            border-left: 4px solid #36b9cc !important;
        }

        .border-left-warning {
            border-left: 4px solid #f6c23e !important;
        }

        .h5 {
            font-size: 1.25rem;
        }

        .text-xs {
            font-size: 0.7rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    @include('petugas.dataBuku.components.sidebar')
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content">
            <div class="container-fluid py-4">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-chart-bar text-primary"></i> Laporan</h1>
                        <p class="text-muted">Kelola dan unduh laporan sistem perpustakaan</p>
                    </div>
                    <div class="d-flex gap-2">
                        <span class="text-sm text-muted">
                            <i class="fa fa-calendar"></i> {{ date('d M Y') }}
                        </span>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <!-- Total Buku -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Buku</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalBuku ?? 0) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Peminjaman -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Peminjaman</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPeminjaman ?? 0) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-arrow-right-arrow-left fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Pengembalian -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Total Pengembalian</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPengembalian ?? 0) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-rotate-left fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buku Tersedia -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Buku Tersedia</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($bukuTersedia ?? 0) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-check-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fa fa-book"></i> Laporan Data Buku
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Laporan lengkap data buku yang tersedia di perpustakaan</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-sm">
                                        <i class="fa fa-file-pdf text-danger"></i> Format PDF
                                    </span>
                                    <a href="{{ route('petugas.laporan.buku') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-download"></i> Unduh Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Laporan Peminjaman -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success">
                                    <i class="fa fa-arrow-right-arrow-left"></i> Laporan Peminjaman
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Laporan data peminjaman buku oleh pengguna</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-sm">
                                        <i class="fa fa-file-pdf text-danger"></i> Format PDF
                                    </span>
                                    <a href="{{ route('petugas.laporan.peminjaman') }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-download"></i> Unduh Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Laporan Pengembalian -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-info">
                                    <i class="fa fa-rotate-left"></i> Laporan Pengembalian
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Laporan data pengembalian buku oleh pengguna</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-sm">
                                        <i class="fa fa-file-pdf text-danger"></i> Format PDF
                                    </span>
                                    <a href="{{ route('petugas.laporan.pengembalian') }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-download"></i> Unduh Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Laporan Kategori -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-warning">
                                    <i class="fa fa-tags"></i> Laporan Kategori
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Laporan data kategori buku yang tersedia</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-sm">
                                        <i class="fa fa-file-pdf text-danger"></i> Format PDF
                                    </span>
                                    <a href="{{ route('petugas.laporan.kategori') }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-download"></i> Unduh Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Get sidebar and content elements
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');

            // Function to toggle sidebar
            function toggleSidebar() {
                sidebar.classList.toggle('hide');
                if (sidebar.classList.contains('hide')) {
                    content.style.marginLeft = '20px';
                } else {
                    content.style.marginLeft = '270px';
                }
            }

            // Add click event to hamburger menu button
            const hamburger = document.getElementById('hamburger');
            if (hamburger) {
                hamburger.addEventListener('click', toggleSidebar);
            }

            // Handle responsive behavior
            function handleResize() {
                if (window.innerWidth <= 768) {
                    content.style.marginLeft = '0';
                    sidebar.classList.add('hide');
                } else {
                    if (!sidebar.classList.contains('hide')) {
                        content.style.marginLeft = '270px';
                    }
                }
            }

            // Initial check
            handleResize();

            // Listen for window resize
            window.addEventListener('resize', handleResize);

            // Set active menu item
            const currentPath = window.location.pathname;
            const menuLinks = document.querySelectorAll('.sidebar a');

            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Handle dropdown toggles
            const dropdownBtns = document.querySelectorAll('.dropdown-btn');
            dropdownBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    parent.classList.toggle('active');
                });
            });

            // Handle pengguna dropdown (if exists)
            const penggunaBtn = document.querySelector('.pengguna-btn');
            if (penggunaBtn) {
                penggunaBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    parent.classList.toggle('active');
                });
            }
        });
    </script>
</body>

</html>