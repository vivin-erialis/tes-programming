<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\item;
use App\Models\transaksi;
use App\Models\voucher;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('transaksi.index',[
            'transaksi' => transaksi::all(),
            'customer' => customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $transaksiId = uniqid();

        transaksi::create([
            'transaksi_id' => $transaksiId,
            'customer_id' => $request->customer_id,
            'total_bayar' => $request->total_bayar
        ]);
        item::create([
            'customer_id' => $request->customer_id,
            'transaksi_id' => $transaksiId,
            'item' => $request->item,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_bayar' => $request->total_bayar
        ]);
        if ($request->total_bayar >= 1000000) {
            $voucherId = uniqid();
            $dateExpired = now()->addMonths(3);
            voucher::create([
                'voucher_id' => $voucherId,
                'customer_id' => $request->customer_id,
                'transaksi_id' => $transaksiId,
                'date_expired' => $dateExpired
            ]);

            return redirect('/transaksi')->with('message', 'Transaksi Berhasil dan anda mendapatkan voucher');
        }
        else {
            return redirect('/transaksi')->with('message', 'Transaksi Berhasil');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
