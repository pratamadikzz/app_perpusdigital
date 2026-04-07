<div class="modal fade" id="edit{{ $book->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow">

            <form method="POST" action="/petugas/dataBuku/update/{{ $book->id }}" enctype="multipart/form-data">
                @csrf

                <!-- Header -->
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Ajukan Edit Buku</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Cover Buku</label>
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/' . $book->cover) }}" width="80" class="rounded shadow-sm">
                        </div>
                        <input type="file" name="cover" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul buku"
                                value="{{ $book->title }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="author" class="form-control" placeholder="Nama penulis"
                                value="{{ $book->author }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="publisher" class="form-control" placeholder="Nama penerbit"
                                value="{{ $book->publisher }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" name="isbn" class="form-control" placeholder="ISBN buku"
                                value="{{ $book->isbn }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Bahasa</label>
                            <input type="text" name="languange" class="form-control" placeholder="Bahasa buku"
                                value="{{ $book->languange }}">
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
                            <input type="number" name="book_width" class="form-control" step="0.01" min="0" placeholder="Lebar buku (cm)"
                                value="{{ $book->book_width }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Halaman</label>
                            <input type="number" name="number_of_books" class="form-control"
                                placeholder="Jumlah halaman" value="{{ $book->number_of_books }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category[]" class="form-control" multiple size="4">
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->KategoriID }}"
                                        {{ $book->categories->contains('KategoriID', $k->KategoriID) ? 'selected' : '' }}>
                                        {{ $k->NamaKategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Tekan Ctrl/Cmd + klik untuk memilih lebih dari satu kategori.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="stock" class="form-control" placeholder="Jumlah buku tersedia"
                                value="{{ $book->stock }}">
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

                <div class="modal-footer">
                    <button class="btn btn-warning text-white">
                        Ajukan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
