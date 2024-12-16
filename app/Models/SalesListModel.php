<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesListModel extends Model
{
    use HasFactory;
    protected $table = "tb_sales_list";
    protected $primaryKey = 'kode_sales_list';
    public $incrementing = false;
    protected $fillable = ['kode_sales_list', 'kode_sales', 'kode_produk',
        'quantity','satuan'
    ];
    public $timestamps = false;
}
