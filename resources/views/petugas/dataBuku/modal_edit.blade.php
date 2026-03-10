<div class="modal fade" id="edit{{ $book->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="POST" action="/petugas/dataBuku/update/{{ $book->id }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Ajukan Edit Buku</h5>
                    <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $book->cover) }}" width="80"
                            class="rounded shadow-sm mb-2">
                        <input type="file" name="cover" class="form-control">
                    </div>

                    <input type="text" name="title" class="form-control mb-2"
                        value="{{ $book->title }}">

                    <input type="text" name="author" class="form-control mb-2"
                        value="{{ $book->author }}">

                    <input type="text" name="publisher" class="form-control mb-2"
                        value="{{ $book->publisher }}">

                    <input type="text" name="category" class="form-control mb-2"
                        value="{{ $book->category }}">

                    <input type="number" name="stock" class="form-control mb-2"
                        value="{{ $book->stock }}">

                    <input type="number" name="publication_year"
                        class="form-control mb-2"
                        value="{{ $book->publication_year }}">

                    <textarea name="description"
                        class="form-control">{{ $book->description }}</textarea>

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
