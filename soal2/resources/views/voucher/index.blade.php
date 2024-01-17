@extends('layout.master')
@section('title', 'Voucher')
@section('content')
    <div class="text-center p-2">
        <h1>Data Voucher</h1>
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
    <div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Voucer Code</th>
                    <th scope="col">Transaksi ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Date Expired</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voucher as $item)
                    <tr>
                        <td>{{ $item->voucher_id }}</td>
                        <td>{{ $item->transaksi_id }}</td>
                        <td>{{ $item->customer->customer_name }}</td>
                        <td>{{ $item->date_expired }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#reedemVoucherModal{{$item->id}}">
                                Reedem
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="reedemVoucherModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reedem Voucher</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/voucher/{{$item->id}}" method="POST">
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
    </div>

@endsection
