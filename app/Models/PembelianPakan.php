<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianPakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'pakan_id',
        'jumlah',
        'harga_total',
        'tanggal_pembelian',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function pakan()
    {
        return $this->belongsTo(Pakan::class);
    }
}
