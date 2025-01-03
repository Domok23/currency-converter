<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Rates</title>
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
        @media (max-width: 576px) {
            /* Memastikan ukuran tombol dan teks di perangkat kecil */
            #theme-toggle {
                padding: 3px 7px;
                font-size: 0.8rem;
            }
            h1 {
                font-size: 1.5rem; /* Ukuran font judul lebih kecil di perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">SGD Exchange Rates</h1>

        <a href="{{ route('all-currencies') }}" class="btn btn-info mb-3">View All Currencies</a>

        <p class="text-muted"><small>Note: The last two columns are examples for calculation purposes only.</small></p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ISO Currency Code</th>
                        <th>Currency Name</th>
                        <th>Exchange Rate</th>
                        <th class="text-muted">*(Exchange Rate) × 2.00</th>
                        <th class="text-muted">*(Exchange Rate) − 10.00</th>
                    </tr>
                </thead>
                <tbody>
                    @if($rates)
                        @foreach($rates as $pair => $rate)
                            <tr>
                                <td>{{ $pair }}</td>
                                <td>{{ $currencies[$pair] ?? 'N/A' }}</td>  <!-- Tampilkan nama currency -->
                                <td>{{ number_format($rate, 2, '.', ',') }}</td>
                                <td class="text-muted">{{ number_format($rate * 2, 2, '.', ',') }}</td>
                                <td class="text-muted">{{ number_format($rate - 10, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No data available</td>
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
