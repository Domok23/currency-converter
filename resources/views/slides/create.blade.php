<!DOCTYPE html>
<html>
<head>
    <title>Tambah Slide</title>
</head>
<body>
    <h1>Tambah Slide Baru</h1>
    <form action="{{ route('slides.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Embed Link:</label>
        <input type="text" name="embed_link" required placeholder="Masukkan embed link Google Slides">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
