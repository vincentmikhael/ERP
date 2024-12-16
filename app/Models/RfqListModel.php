<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqListModel extends Model
{
    use HasFactory;
    protected $table = "tb_rfq_list";
    protected $primaryKey = 'kode_rfq_list';
    public $incrementing = false;
    protected $fillable = ['kode_rfq_list', 'kode_rfq', 'kode_produk',
        'quantity','satuan'
    ];
    public $timestamps = false;
}
