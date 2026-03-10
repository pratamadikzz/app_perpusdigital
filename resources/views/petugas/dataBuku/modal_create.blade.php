<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="POST" action="/petugas/dataBuku/store" enctype="multipart/form-data">
                @csrf

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Ajukan Tambah Buku</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-2">
                        <label class="form-label">Cover Buku</label>
                        <input type="file" name="cover" class="form-control">
                    </div>

                    <input type="text" name="title" class="form-control mb-2" placeholder="Judul Buku">

                    <input type="text" name="author" class="form-control mb-2" placeholder="Penulis">

                    <input type="text" name="publisher" class="form-control mb-2" placeholder="Penerbit">

                    <select name="KategoriID" class="form-select mb-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->KategoriID }}">
                                {{ $k->NamaKategori }}
                            </option>
                        @endforeach
                    </select>

                    <input type="number" name="stock" class="form-control mb-2" placeholder="Stok">

                    <input type="number" name="publication_year" class="form-control mb-2" placeholder="Tahun">

                    <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Ajukan ke Admin
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
