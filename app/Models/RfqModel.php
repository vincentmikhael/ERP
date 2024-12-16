<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqModel extends Model
{
    use HasFactory;
    protected $table = "tb_rfq";
    protected $primaryKey = 'kode_rfq';
    public $incrementing = false;
    protected $fillable = ['kode_rfq', 'kode_vendor', 'tanggal_transaksi', 
        'status', 'total_harga','metode_pembayaran'
    ];
    public $timestamps = false;
}
