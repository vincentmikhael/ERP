<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    use HasFactory;
    protected $table = "tb_sales";
    protected $primaryKey = 'kode_sales';
    public $incrementing = false;
    protected $fillable = ['kode_sales', 'kode_customer', 'tanggal_transaksi', 
        'status', 'total_harga','metode_pembayaran'
    ];
    public $timestamps = false;
}
