<div class="modal fade" id="edit{{ $book->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('admin.dataBuku.update', $book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul buku" value="{{ $book->title }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="author" class="form-control" placeholder="Nama penulis" value="{{ $book->author }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="publisher" class="form-control" placeholder="Nama penerbit" value="{{ $book->publisher }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" name="isbn" class="form-control" placeholder="Nama penerbit" value="{{ $book->isbn }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Bahasa</label>
                            <input type="text" name="languange" class="form-control" placeholder="Nama penerbit" value="{{ $book->languange }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Panjang Buku</label>
                            <input type="number" name="book_length" class="form-control" step="0.01" min="0"
                                placeholder="Panjang buku (cm)" value="{{ $book->book_length }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Berat Buku</label>
                            <input type="number" name="book_weight" class="form-control" step="0.01" min="0"
                                placeholder="Berat buku (gram)" value="{{ $book->book_weight }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lebar Buku</label>
                            <input type="number" name="book_width" class="form-control" step="0.01" min="0"
                                placeholder="Lebar buku (cm)" value="{{ $book->book_width }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Halaman</label>
                            <input type="number" name="number_of_books" class="form-control" placeholder="Nama penerbit" value="{{ $book->number_of_books }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>

                            <select name="category[]" class="form-control" multiple size="4">
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->KategoriID}}" {{ $book->categories->contains('KategoriID', $k->KategoriID) ? 'selected' : '' }}>
                                        {{ $k->NamaKategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Tekan Ctrl/Cmd + klik untuk memilih lebih dari satu kategori.</div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="stock" class="form-control"
                                placeholder="Jumlah buku tersedia" value="{{ $book->stock }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" name="publication_year" class="form-control"
                                placeholder="Contoh: 2024" value="{{ $book->publication_year }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Buku</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Ringkasan atau informasi buku...">{{ $book->description }}</textarea>
                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button  class="btn btn-primary px-4">
                        Update Buku
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
