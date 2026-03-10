<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link rel="stylesheet" href="css/petugas_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    @include('petugas.dataBuku.components.sidebar')
    <!-- Main Content -->
    <div class="main">
        @include('petugas.dataBuku.components.nav')

        <div class="content">

            <div class="cards">

                <div class="card">
                    <i class="fa fa-book icon"></i>
                    <h4>Total Buku</h4>
                    <div class="number">{{ $totalBuku }}</div>
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
