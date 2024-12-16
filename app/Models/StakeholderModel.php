<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakeholderModel extends Model
{
    use HasFactory;
    protected $table = "tb_stakeholder";
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $fillable = ['kode', 'nama', 'telpon',
        'alamat', 'level'
    ];
    public $timestamps = false;
}
