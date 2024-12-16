<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "tb_produk";
    protected $primaryKey = 'kode_produk';
    public $incrementing = false;
    protected $fillable = ['kode_produk', 'nama_produk', 'deskripsi_produk',
        'gambar', 'kuantitas', 'harga', 'status'
    ];
    public $timestamps = false;
}
