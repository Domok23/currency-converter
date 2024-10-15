<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Currencies Exchange Rates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <style>
        body {
            transition: background-color 0.5s, color 0.5s;
        }
        .dark-mode {
            background-color: #121212;
            color: white;
        }
        .dark-mode .table {
            background-color: #1e1e1e;
            color: white;
        }
        /* Style untuk tombol switch */
        #theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 5px 10px;
            font-size: 0.9rem; /* Ukuran font yang lebih kecil */
            z-index: 1000; /* Pastikan tombol di atas elemen lain */
        }
    </style>

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">All Currencies Exchange Rates</h1>
        <a href="{{ route('sgd-rates') }}" class="btn btn-info mb-3">View SGD Exchange Rates</a>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('all-currencies') }}" class="mb-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search by ISO Currency Code" value="{{ request('search') }}">
                </div>
                <div class="col-12 col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Search</button> <!-- Tombol memenuhi lebar pada perangkat kecil -->
                </div>
            </div>
        </form>

        <div class="table-responsive"> <!-- Menjadikan tabel responsif -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ISO Currency Code</th>
                        <th>Currency Name</th>
                        <th>Exchange Rate (SGD to Currency)</th>
                    </tr>
                </thead>
                <tbody>
                    @if($currencies && $rates)
                        @foreach($currencies as $currencyCode => $currencyName)
                            <tr>
                                <td>{{ strtoupper($currencyCode) }}</td>
                                <td>{{ $currencyName }}</td>
                                @if(isset($rates[$currencyCode]))
                                    <td>{{ number_format($rates[$currencyCode], 2, '.', ',') }}</td>
                                @else
                                    <td>N/A</td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No data available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol untuk switch antara mode gelap dan terang -->
    <button id="theme-toggle" class="btn btn-secondary">🌙</button>

    <script>
        const toggleButton = document.getElementById('theme-toggle');
        const body = document.body;

        // Cek apakah dark mode sudah disimpan di local storage
        if (localStorage.getItem('dark-mode') === 'true') {
            body.classList.add('dark-mode');
            toggleButton.textContent = '🌞'; // Ubah ikon menjadi matahari
        }

        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const isDarkMode = body.classList.contains('dark-mode');
            toggleButton.textContent = isDarkMode ? '🌞' : '🌙'; // Ubah ikon sesuai mode
            // Simpan pilihan pengguna di local storage
            localStorage.setItem('dark-mode', isDarkMode);
        });
    </script>
</body>
</html>
