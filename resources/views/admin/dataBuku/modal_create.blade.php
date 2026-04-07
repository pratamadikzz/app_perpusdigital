<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow">

            <form method="POST" action="{{ route('dataBuku.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Header -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Buku Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Cover Buku</label>
                        <input type="file" name="cover" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul buku">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="author" class="form-control" placeholder="Nama penulis">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="publisher" class="form-control" placeholder="Nama penerbit">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" name="isbn" id="nomor_isbn" class="form-control" placeholder="Nama penerbit" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Bahasa</label>
                            <input type="text" name="languange" class="form-control" placeholder="Nama penerbit">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Panjang Buku</label>
                            <input type="number" name="book_length" class="form-control" step="0.01" min="0"
                                placeholder="Panjang buku (cm)">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Berat Buku</label>
                            <input type="number" name="book_weight" class="form-control" step="0.01" min="0"
                                placeholder="Berat buku (gram)">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lebar Buku</label>
                            <input type="number" name="book_width" class="form-control" step="0.01" min="0"
                                placeholder="Lebar buku (cm)">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Halaman</label>
                            <input type="number" name="number_of_books" class="form-control" placeholder="Nama penerbit">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>

                            <select name="category[]" class="form-control" multiple size="4">
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->KategoriID}}">
                                        {{ $k->NamaKategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Tekan Ctrl/Cmd + klik untuk memilih lebih dari satu kategori.</div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="stock" class="form-control"
                                placeholder="Jumlah buku tersedia">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" name="publication_year" class="form-control"
                                placeholder="Contoh: 2024">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Buku</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Ringkasan atau informasi buku..."></textarea>
                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary px-4">
                        Simpan Buku
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
            function generateNomorPeminjaman() {
            const datePart = new Date().toISOString().slice(0, 10).replace(/-/g, '');
            const randomPart = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
            return `IS-${datePart}-${randomPart}`;
        }

        // Generate nomor peminjaman
        document.getElementById('nomor_isbn').value = generateNomorPeminjaman();
</script>
