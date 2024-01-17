<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Relasi satu ke banyak dengan tabel Voucher
    public function voucher()
    {
        return $this->hasMany(Voucher::class, 'transaksi_id', 'transaksi_id');
    }
}
