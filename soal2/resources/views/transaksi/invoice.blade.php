<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h2>Invoice</h2>
                <p><strong>Transaksi ID:</strong> {{ $transaksi->transaksi_id }}</p>

            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h5>Detail Pelanggan</h5><hr>
                <p><strong>Nama :</strong> {{ $transaksi->customer->customer_name }}</p>
                <p><strong>No HP :</strong> {{ $transaksi->customer->phone_number }}</p>
                <p><strong>Email :</strong> {{ $transaksi->customer->email }}</p>
                @if ($transaksi->total_bayar >= 1000000)
                <p class="text-right"><strong>Voucher :</strong> Rp. 10.000</p>

            @else
            <p class="text-right"><strong>Voucher :</strong> -</p>

            @endif
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-right">
                <p><strong>Total :</strong> Rp. {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
