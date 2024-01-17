<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\transaksi;
use App\Models\voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('voucher.index', [
            'voucher' => voucher::all(),
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
    }

    /**
     * Display the specified resource.
     */
    public function show(voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $voucher = voucher::findOrFail($id);

        if($voucher->status === 'Sudah Terpakai' || $voucher->date_expired < Carbon::now()) {
            return redirect('/voucher')->with('message', 'Voucher sudah terpakai');
        }

        $voucher->update([
            'status' => 'Sudah Terpakai'
        ]);
            return redirect('/voucher')->with('message', 'Voucher Berhasil Di Reedem');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(voucher $voucher)
    {
        //
    }
}
