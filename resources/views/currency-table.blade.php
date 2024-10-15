<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Rates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>SGD Exchange Rates</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ISO Currency Code</th>
                    <th>Exchange Rate</th>
                    <th>(Exchange Rate) * 2.00</th>
                    <th>(Exchange Rate) - 10.00</th>
                </tr>
            </thead>
            <tbody>
                @if($rates)
                    @foreach($rates as $pair => $rate)
                        <tr>
                            <td>{{ $pair }}</td>
                            <td>{{ number_format($rate, 2, '.', ',') }}</td>
                            <td>{{ number_format($rate * 2, 2, '.', ',') }}</td>  <!-- Mengalikan rate dengan 2 -->
                            <td>{{ number_format($rate - 10, 2, '.', ',') }}</td> <!-- Mengurangi rate dengan 10 -->
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
