<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    protected $fillable = [
        'nama_pakan',
        'jenis_pakan_id',
        'stok',
        'reorder_point',
        'harga_beli',
        'harga_jual'
    ];

    public function jenisPakan()
    {
        return $this->belongsTo(JenisPakan::class, 'jenis_pakan_id');
    }
}
