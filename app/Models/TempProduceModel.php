<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempProduceModel extends Model
{
    use HasFactory;
    protected $table = "temp_produce";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'kode_bom_list', 'quantity_order'];
    public $timestamps = false;
}
