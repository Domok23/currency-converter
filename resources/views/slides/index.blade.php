<!DOCTYPE html>
<html>
<head>
    <title>Daftar Google Slides</title>
</head>
<body>
    <h1>Daftar Google Slides</h1>
    <a href="{{ route('slides.create') }}">Tambah Slide Baru</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Preview</th>
            <th>Actions</th>
        </tr>
        @foreach ($slides as $slide)
            <tr>
                <td>{{ $slide->title }}</td>
                <td>
                    <iframe src="{{ $slide->embed_link }}" width="300" height="200"></iframe>
                </td>
                <td>
                    <a href="{{ route('slides.edit', $slide->id) }}">Edit</a>
                    <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
