<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BomListModel extends Model
{
    use HasFactory;
    protected $table = "tb_bom_list";
    protected $primaryKey = 'kode_bom_list';
    public $incrementing = false;
    protected $fillable = ['kode_bom','kode_produk','quantity', 'satuan'];
    public $timestamps = false;
}
