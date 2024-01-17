<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CetakInvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('customer.index');
// });

Route::resource('/', CustomerController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::resource('/voucher', VoucherController::class);
Route::get('/print-invoice/{transaksiId}', [CetakInvoiceController::class, 'cetakInvoice'])->name('cetak.invoice');

