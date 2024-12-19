<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Google Slides</title>
    <style>
        /* Reset margin dan padding */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Mengatur layout tabel responsif */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        /* Atur ukuran iframe dan buat responsive */
        iframe {
            width: 100%;
            height: 300px;
            max-width: 600px;
            max-height: 400px;
        }

        /* Gaya tombol */
        button {
            padding: 10px 15px;
            background-color: #d9534f;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #c9302c;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            td, th {
                display: block;
                width: 100%;
                text-align: left;
            }

            tr {
                display: flex;
                flex-direction: column;
                margin-bottom: 20px;
            }

            iframe {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Google Slides</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('slides.create') }}">Tambah Slide Baru</a>
    </div>

    @if (session('success'))
        <p style="text-align: center; color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>Title</th>
            <th>Preview</th>
            <th>Actions</th>
        </tr>
        @foreach ($slides as $slide)
            <tr>
                <td>{{ $slide->title }}</td>
                <td>
                    <iframe src="{{ $slide->embed_link }}" allowfullscreen></iframe>
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
