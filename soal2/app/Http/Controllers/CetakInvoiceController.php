<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakInvoiceController extends Controller
{
    public function cetakInvoice($id)
    {
        $transaksi = transaksi::findOrFail($id);

        $pdf = Pdf::loadView('transaksi.invoice', compact('transaksi'));

        return $pdf->stream('transaksi_'.$transaksi->id.'.pdf');
    }
}


