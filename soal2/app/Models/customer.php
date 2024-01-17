<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $guarded = [];

   // Relasi satu ke banyak dengan tabel Transaksi
   public function transaksi()
   {
       return $this->hasMany(Transaksi::class, 'customer_id', 'customer_id');
   }

   // Relasi satu ke banyak dengan tabel Voucher
   public function voucher()
   {
       return $this->hasMany(Voucher::class, 'customer_id', 'customer_id');
   }
}
