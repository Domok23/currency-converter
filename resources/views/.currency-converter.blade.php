<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<body>
    <h1>Currency Converter</h1>
    <!-- resources/views/currency/exchange_rates.blade.php -->
    <table>
        <thead>
            <tr>
                <th>Mata Uang</th>
                <th>Nilai Tukar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exchangeRates as $currency => $exchangeRate)
                <tr>
                    <td>{{ strtoupper($currency) }}</td>
                    <td>{{ $exchangeRate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
