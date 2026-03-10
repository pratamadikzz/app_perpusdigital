<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <div class="main">
        <h2>Edit Kategori</h2>

        <form method="POST" action="{{ route('kategori.update', $kategori->KategoriID) }}">
            @csrf
            @method('PUT')

            <input type="text" name="NamaKategori" value="{{ $kategori->NamaKategori }}">

            <button type="submit">Update</button>
        </form>
    </div>

</body>

</html>
