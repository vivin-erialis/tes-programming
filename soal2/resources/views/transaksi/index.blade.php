@extends('layout.master')
@section('title', 'Transaksi')
@section('content')
    <div class="text-center p-2">
        <h1>Data Transaksi</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col mt-1">
            @if (session()->has('message'))
                <div class="alert d-flex align-items-center" style="background-color: rgb(66, 66, 111); color: white;"
                    role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#transaksiModal">
        Add New Transaksi
    </button>
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="transaksi" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer Name</label>

                            <select name="customer_id" id="" class="form-control">
                                @foreach ($customer as $item)
                                    <option value="{{ $item->customer_id }}">{{ $item->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Item</label>
                            <input type="text" class="form-control" name="item" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                aria-describedby="emailHelp" onclick="hitungTotal()">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Total Bayar</label>
                            <input type="number" class="form-control" name="total_bayar" id="total_bayar"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Transaksi Code</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Payment</th>
                <th scope="col">Voucher</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $item->transaksi_id }}</td>
                    <td>{{ $item->customer->customer_name }}</td>
                    <td>Rp. {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        @if ($item->total_bayar >= 1000000)
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#reedemVoucherModal{{ $item->id }}">
                                Reedem
                            </button>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('cetak.invoice', ['transaksiId' => $item->id]) }}" target="_blank">Cetak Invoice</a>

                    </button>
                    </td>
                </tr>
                <div class="modal fade" id="reedemVoucherModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reedem Voucher</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/voucher/{{ $item->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    Reedem Voucher Anda?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Reedem</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <tr>

        </tbody>
    </table>

    <script>
        function hitungTotal() {
          const harga = document.getElementById('harga').value;
          const jumlah = document.getElementById('jumlah').value;

          const totalBayar = harga * jumlah;

          document.getElementById('total_bayar').value = totalBayar;
        }
      </script>
@endsection
