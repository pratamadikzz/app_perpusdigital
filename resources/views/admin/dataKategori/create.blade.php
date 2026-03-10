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
<h2>Tambah Kategori</h2>

<form method="POST" action="{{ route('kategori.store') }}">
@csrf

<input type="text" name="NamaKategori" placeholder="Nama kategori">

<button type="submit">Simpan</button>
</form>
</div>

</body>
</html>
