<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin | Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f4f6;
        }


        /* ===== Header ===== */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-weight: 600;
        }

        /* tombol */
        .btn {
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        /* ===== Search ===== */
        .search-box {
            margin-bottom: 20px;
        }

        .search-box input {
            width: 300px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        /* ===== Folder Grid ===== */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, 200px);
            gap: 20px;
        }

        /* ===== Folder Style ===== */
        .folder {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: .2s;
            position: relative;
        }

        .folder:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .folder-icon {
            font-size: 55px;
            color: #facc15;
            margin-bottom: 10px;
        }

        .folder h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* tombol aksi */
        .aksi {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .aksi button {
            padding: 6px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        .aksi button:first-child {
            background: #3b82f6;
            color: white;
        }

        .aksi button:last-child {
            background: #ef4444;
            color: white;
        }

        /* ===== Modal ===== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-box h3 {
            margin-bottom: 15px;
        }

        .modal-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .modal-box button {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .modal-box form button {
            background: #2563eb;
            color: white;
        }

        .modal-box>button {
            background: #e5e7eb;
            margin-top: 10px;
        }
    </style>

</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <div class="main">

        <div class="header">
            <h2>Kategori Buku</h2>
            <button onclick="openModal('modalTambah')" class="btn">
                + Tambah
            </button>
        </div>

        <div class="search-box">
            <input type="text" placeholder="Cari kategori...">
        </div>


        <div class="grid">
            @foreach ($kategori as $item)
                <div class="folder" onclick="window.location='/admin/kategori/{{ $item->KategoriID }}'">

                    <i class="fa-solid fa-folder-open folder-icon"></i>
                    <h3>{{ $item->NamaKategori }}</h3>

                    <div class="aksi">
                        <button
                            onclick="event.stopPropagation(); openEdit({{ $item->KategoriID }}, '{{ $item->NamaKategori }}')">
                            Edit
                        </button>

                        <button onclick="event.stopPropagation();openDelete({{ $item->KategoriID }})">
                            Hapus
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div id="modalTambah" class="modal">
        <div class="modal-box">
            <h3>Tambah Kategori</h3>

            <form method="POST" action="{{ route('kategori.store') }}">
                @csrf
                <input type="text" name="NamaKategori" placeholder="Nama kategori">
                <button>Simpan</button>
            </form>

            <button onclick="closeModal('modalTambah')">Tutup</button>
        </div>
    </div>

    <div id="modalEdit" class="modal">
        <div class="modal-box">
            <h3>Edit Kategori</h3>

            <form method="POST" id="formEdit">
                @csrf
                @method('PUT')

                <input type="text" name="NamaKategori" id="editNama">
                <button>Update</button>
            </form>

            <button onclick="closeModal('modalEdit')">Tutup</button>
        </div>
    </div>

    <div id="modalDelete" class="modal">
        <div class="modal-box">
            <h3>Hapus kategori?</h3>

            <form method="POST" id="formDelete">
                @csrf
                @method('DELETE')
                <button>Ya, hapus</button>
            </form>

            <button onclick="closeModal('modalDelete')">Batal</button>
        </div>
    </div>



    <script>
        function openModal(id) {
            document.getElementById(id).style.display = "flex";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }

        function openEdit(id, nama) {
            document.getElementById('editNama').value = nama;
            document.getElementById('formEdit').action =
                '/admin/kategori/' + id;
            openModal('modalEdit');
        }

        function openDelete(id) {
            document.getElementById('formDelete').action =
                '/admin/kategori/' + id;
            openModal('modalDelete');
        }
    </script>



</body>

</html>
